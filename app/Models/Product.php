<?php

namespace App\Models;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Brand,Product>
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Category,Product>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Unit,Product>
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Warranty,Product>
     */
    public function warranty(): BelongsTo
    {
        return $this->belongsTo(Warranty::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Warehouse,Product>
     */
    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<AdditionalImage>
     */
    public function additionalImages(): HasMany
    {
        return $this->hasMany(AdditionalImage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Sku>
     */
    public function skus(): HasMany
    {
        return $this->hasMany(Sku::class);
    }

    /**
     * @return array<mixed>
     */
    public static function getForm(): array
    {
        return [
            Section::make('General Information')
                ->columns(2)
                ->collapsible()
                ->schema([
                    TextInput::make('name')
                        ->label('Product Name')
                        ->unique(ignoreRecord: true)
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (string $operation, $state, Set $set) {
                            if ($operation !== 'create') {
                                return;
                            }

                            $set('slug', Str::slug($state));
                        }),

                    TextInput::make('slug')->unique(ignoreRecord: true)->required(),

                    Group::make()
                        ->columnSpanFull()
                        ->columns(3)
                        ->schema([
                            Select::make('category_id')
                                ->relationship('category', 'name')
                                ->label('Category')
                                ->exists('categories', 'id')
                                ->searchable()
                                ->preload()
                                ->required(),

                            Select::make('brand_id')
                                ->relationship('brand', 'name')
                                ->label('Brand')
                                ->exists('brands', 'id')
                                ->searchable()
                                ->preload()
                                ->required(),

                            Select::make('warehouse_id')
                                ->relationship('warehouse', 'name')
                                ->label('Warehouse')
                                ->exists('warehouses', 'id')
                                ->searchable()
                                ->preload()
                                ->required(),
                        ]),

                    RichEditor::make('description')->columnSpanFull()->required(),


                    Select::make('unit_id')
                    ->relationship('unit', 'name')
                    ->label('Unit')
                    ->exists('units', 'id')
                    ->searchable()
                    ->preload()
                    ->required(),

                    TextInput::make('sku')->required(),

                    Select::make('warranty_id')
                        ->relationship('warranty', 'name')
                        ->label('Warranty')
                        ->exists('brands', 'id')
                        ->searchable()
                        ->preload()
                        ->nullable()
                        ->columnSpanFull()
                        ->default(null),

                    DatePicker::make('manufactured_date')
                        ->native(false)
                        ->nullable()
                        ->format('d-m-Y'),

                    DatePicker::make('expired_date')
                        ->native(false)
                        ->nullable()
                        ->format('d-m-Y'),
                ]),

            Section::make('Pricing & Stock')
                ->collapsible()
                ->columns(3)
                ->schema([
                    TextInput::make('price')->label('Product Price')->numeric()->prefix('$')->required(),

                    TextInput::make('qty')->label('Product Quantity')->numeric()->minValue(5)->required(),

                    TextInput::make('stock_alert')->label('Product Stock Alert')->numeric()->minValue(1)->required(),

                    Group::make()
                        ->columnSpanFull()
                        ->columns(4)
                        ->schema([
                            Select::make('discount_type')
                                ->options([
                                    'percentage' => 'Percentage',
                                    'fixed' => 'Fixed',
                                ])
                                ->live()
                                ->nullable(),

                            DatePicker::make('discount_start_date')
                                ->native(false)
                                ->required(function (Get $get) {
                                    return $get('discount_type') === 'percentage' || $get('discount_type') === 'fixed' ? true : false;
                                })
                                ->format('d-m-Y'),

                            DatePicker::make('discount_end_date')
                                ->native(false)
                                ->required(function (Get $get) {
                                    return $get('discount_type') === 'percentage' || $get('discount_type') === 'fixed' ? true : false;
                                })
                                ->format('d-m-Y'),

                            TextInput::make('discount_price')
                                ->label('Discount Value')
                                ->numeric()
                                ->maxValue(fn (Get $get): int => $get('type') === 'percentage' ? 100 : 99999999999)
                                ->prefix(function (Get $get) {
                                    return match ($get('discount_type')) {
                                        'fixed' => '$',
                                        'percentage' => '%',
                                        default => null,
                                    };
                                })
                                ->required(function (Get $get) {
                                    return $get('discount_type') === 'percentage' || $get('discount_type') === 'fixed' ? true : false;
                                }),
                        ]),
                ]),

            Section::make('Product Images')
                ->collapsible()
                ->columns(2)
                ->schema([
                    FileUpload::make('image')
                      ->label('Main Image')
                      ->image()
                      ->disk('public')
                      ->directory('products')
                      ->preserveFilenames()
                      ->maxSize(1024 * 1024 * 2)
                      ->required(),

                    FileUpload::make('additional_images')
                      ->label('Additional Images')
                      ->image()
                      ->multiple()
                      ->disk('public')
                      ->directory('products')
                      ->preserveFilenames()
                      ->maxSize(1024 * 1024 * 2)
                      ->nullable(),
                ]),
        ];
    }

    /**
     * @return array<mixed>
     */
    public static function getTableColumns(): array
    {
        return [
            ImageColumn::make('image')->square(),

            TextColumn::make('name')->searchable(),

            TextColumn::make('category.name')->numeric()->sortable(),

            TextColumn::make('qty')->numeric()->sortable(),

            TextColumn::make('price')->money('USD')->sortable(),

            TextColumn::make('unit.short_name')->numeric()->sortable(),

            TextColumn::make('discount_type')->default('-')->searchable(),

            TextColumn::make('stock_alert')->numeric()->sortable(),

            SelectColumn::make('status')->options([
                "inactive" => "Inactive",
                "published" => "Published",
            ]),

            TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}

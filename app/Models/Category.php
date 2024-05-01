<?php

namespace App\Models;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Category,Category>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Category>
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Product>
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User,Category>
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return array<mixed>
     */
    public static function getForm(): array
    {
        return [
            Section::make()
                ->columns(2)
                ->schema([
                    Select::make('parent_id')
                        ->relationship('parent', 'name')
                        ->label('Parent Category')
                        ->exists('categories', 'id')
                        ->searchable()
                        ->preload()
                        ->nullable()
                        ->default(null)
                        ->columnSpanFull(),

                    TextInput::make('name')
                        ->label('Category Name')
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

                    Textarea::make('description')->rows(5)->nullable()->columnSpanFull(),

                    FileUpload::make('image')
                        ->label('Category Image')
                        ->image()
                        ->disk('public')
                        ->directory('categories')
                        ->preserveFilenames()
                        ->maxSize(1024 * 1024 * 2)
                        ->nullable()
                        ->columnSpanFull(),

                    Toggle::make('status')->required(),
                ]),
        ];
    }

    /**
     * @return array<mixed>
     */
    public static function getTableColumns(): array
    {
        return [
            ImageColumn::make('image'),

            TextColumn::make('parent.name')->label('Parent Category')->default('-')->numeric()->sortable(),

            TextColumn::make('name')
                ->description(fn (Category $record): string => $record->description ? Str::limit($record->description, 60) : '')
                ->sortable()
                ->searchable(),

            TextColumn::make('createdBy.name')->numeric()->sortable()->searchable(),

            TextColumn::make('status')
                ->sortable()
                ->formatStateUsing(fn (string $state): string => $state ? 'Active' : 'Inactive')
                ->badge()
                ->color(
                    fn (bool $state): string => match ($state) {
                        true => 'success',
                        false => 'warning',
                    },
                ),

            TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}

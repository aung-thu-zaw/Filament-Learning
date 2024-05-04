<?php

namespace App\Models;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Country,Warehouse>
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Province,Warehouse>
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<City,Warehouse>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Product>
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return array<mixed>
     */
    public static function getForm(): array
    {
        return [
            Section::make()
                ->columns(3)
                ->schema([
                    TextInput::make('name')->label("Warehouse")->required()->columnSpanFull(),

                    Select::make('country_id')
                        ->relationship('country', 'name')
                        // ->searchable()
                        // ->preload()
                        ->live()
                        ->afterStateUpdated(fn (Set $set) => $set('province_id', null))
                        ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                        ->required(),

                    Select::make('province_id')
                        ->relationship('province', 'name')
                        ->options(fn (Get $get) =>  Province::where('country_id', (int) $get('country_id'))->orderBy('name')->pluck('name', 'id'))
                        ->required()
                        // ->searchable()
                        // ->preload()
                        ->live()
                        ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                        ->disabled(function (Get $get): bool {
                            return $get("country_id") ? false : true;
                        }),

                    Select::make('city_id')
                        ->relationship('city', 'name')
                        ->options(fn (Get $get) =>  City::where("province_id", (int) $get('country_id'))->orderBy('name')->pluck('name', 'id'))
                        // ->searchable()
                        // ->preload()
                        ->required()
                        ->live()
                        ->disabled(function (Get $get): bool {
                            return $get("country_id") && $get('province_id') ? false : true;
                        }),

                    TextInput::make('zip_code')->columnSpanFull(),

                    TextInput::make('address')->required()->columnSpanFull(),

                    TextInput::make('contact_person')->required(),

                    TextInput::make('contact_email')->email()->unique(ignoreRecord:true)->required(),

                    TextInput::make('contact_phone')->tel()->unique(ignoreRecord:true)->required(),

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
            TextColumn::make('name')->label("Warehouse")->sortable()->searchable(),

            TextColumn::make('country.name')->numeric()->sortable(),

            TextColumn::make('province.name')->numeric()->sortable(),

            TextColumn::make('city.name')->numeric()->sortable(),

            TextColumn::make('address')->sortable()->searchable(),

            TextColumn::make('zip_code')->sortable()->searchable(),

            TextColumn::make('contact_person')->sortable()->searchable(),

            TextColumn::make('contact_email')->sortable()->searchable(),

            TextColumn::make('contact_phone')->sortable()->searchable(),

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

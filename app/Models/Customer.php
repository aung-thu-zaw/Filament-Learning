<?php

namespace App\Models;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Country,Customer>
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Province,Customer>
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<City,Customer>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
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
                    TextInput::make('name')->required(),

                    TextInput::make('email')->email()->unique(ignoreRecord:true)->required(),

                    TextInput::make('phone')->tel()->unique(ignoreRecord:true)->required(),

                    TextInput::make('address')->required()->columnSpanFull(),

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

                    Textarea::make('description')->rows(5)->nullable()->columnSpanFull(),

                    FileUpload::make('avatar')
                        ->image()
                        ->disk('public')
                        ->directory('customers')
                        ->preserveFilenames()
                        ->maxSize(1024 * 1024 * 2)
                        ->required()
                        ->columnSpanFull(),
                ]),
        ];
    }

    /**
     * @return array<mixed>
     */
    public static function getTableColumns(): array
    {
        return [
            ImageColumn::make('avatar')->circular(),

            TextColumn::make('name')->sortable()->searchable(),

            TextColumn::make('email')->sortable()->searchable(),

            TextColumn::make('phone')->sortable()->searchable(),

            TextColumn::make('country.name')->numeric()->sortable(),

            TextColumn::make('province.name')->numeric()->sortable(),

            TextColumn::make('city.name')->numeric()->sortable(),

            TextColumn::make('address')->sortable()->searchable(),

            TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}

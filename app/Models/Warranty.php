<?php

namespace App\Models;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Warranty extends Model
{
    use HasFactory;

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
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('Warranty Name')
                        ->unique(ignoreRecord: true)
                        ->required()
                        ->columnSpanFull(),

                    TextInput::make('duration')
                        ->numeric()
                        ->minValue(1)
                        ->required(),

                    Select::make('periods')
                        ->options([
                            "week" => "Week",
                            "month" => "Month",
                            "year" => "Year",
                        ])
                        ->required(),

                    Textarea::make('description')
                        ->rows(5)
                        ->required()
                        ->columnSpanFull(),

                    Toggle::make('status')
                        ->required(),
                ]),
        ];
    }

    /**
     * @return array<mixed>
     */
    public static function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->description(fn (Warranty $record): string => $record->description ? Str::limit($record->description, 60) : '')
                ->sortable()
                ->searchable(),

            TextColumn::make('duration')
                ->sortable()
                ->formatStateUsing(fn (string $state, Warranty $record): string => "$state ".Str::ucfirst($record->periods).($record->duration > 1 ? 's' : '')),

            TextColumn::make('status')
                ->sortable()
                ->formatStateUsing(fn (string $state): string => $state ? "Active" : "Inactive")
                ->badge()
                ->color(fn (bool $state): string => match ($state) {
                    true => 'success',
                    false => 'warning',
                }),

            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}

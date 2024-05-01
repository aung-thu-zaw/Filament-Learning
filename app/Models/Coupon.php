<?php

namespace App\Models;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Coupon extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<User>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'coupon_user')->withTimestamps();
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
                    TextInput::make('code')->unique(ignoreRecord: true)->required(),

                    Select::make('type')
                        ->options([
                            'percentage' => 'Percentage',
                            'fixed' => 'Fixed',
                        ])
                        ->live()
                        ->required(),

                    TextInput::make('value')
                        ->label('Discount')
                        ->numeric()
                        ->maxValue(fn (Get $get): int => $get('type') === 'percentage' ? 100 : 99999999999)
                        ->prefix(function (Get $get) {
                            return match ($get('type')) {
                                'fixed' => '$',
                                'percentage' => '%',
                                default => null
                            };
                        })
                        ->required(),

                    TextInput::make('min_spend')->numeric()->prefix('$')->default(0)->nullable(),

                    DatePicker::make('start_date')->native(false)->format('d-m-Y'),

                    DatePicker::make('end_date')->native(false)->format('d-m-Y'),

                    TextInput::make('usage_limit')->numeric()->nullable()->columnSpanFull(),

                    Textarea::make('description')->rows(5)->nullable()->columnSpanFull(),

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
            TextColumn::make('code')
                ->description(fn (Coupon $record): string => $record->description ? Str::limit($record->description, 60) : '')
                ->sortable()
                ->searchable(),

            TextColumn::make('type')
                ->badge()
                ->color(
                    fn (string $state): string => match ($state) {
                        'percentage' => 'info',
                        'fixed' => 'success',
                        default => 'primary',
                    },
                )
                ->sortable(),

            TextColumn::make('value')
                ->label('Discount')
                ->formatStateUsing(function (string $state, Coupon $record): string {
                    return $record->type === 'percentage' ? '%'.$state : '$'.number_format(floatval($state), 2);
                })
                ->sortable(),

            TextColumn::make('min_spend')->money('USD')->sortable(),

            TextColumn::make('start_date')->date()->sortable(),

            TextColumn::make('end_date')->date()->sortable(),

            TextColumn::make('status')
                ->sortable()
                ->formatStateUsing(fn (string $state): string => $state ? 'Active' : 'Inactive')
                ->badge()
                ->color(fn (bool $state): string => match ($state) {
                    true => 'success',
                    false => 'warning',
                }),

            TextColumn::make('usage_limit')->numeric()->default('-')->sortable(),

            TextColumn::make('coupon.users')->label('Total Used')->counts('users')->numeric()->default(0)->sortable(),

            TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}

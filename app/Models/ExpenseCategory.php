<?php

namespace App\Models;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ExpenseCategory extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Expense>
     */
    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * @return array<mixed>
     */
    public static function getForm(): array
    {
        return [
            Section::make()
                ->schema([
                    TextInput::make('name')->unique(ignoreRecord: true)->required(),

                    Textarea::make('description')->rows(5)->maxLength(600)->helperText("Maximum 600 Characters")->required(),
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
                ->description(fn (ExpenseCategory $record): string => $record->description ? Str::limit($record->description, 120) : '')
                ->sortable()
                ->searchable(),

            TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}

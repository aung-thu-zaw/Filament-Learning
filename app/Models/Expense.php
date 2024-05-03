<?php

namespace App\Models;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<ExpenseCategory,Expense>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }

    /**
     * @return array<mixed>
     */
    public static function getForm(): array
    {
        return [
            Section::make()
                ->schema([
                    TextInput::make('reference')->unique(ignoreRecord: true)->required(),

                    Select::make('expense_category_id')
                        ->relationship('category', 'name')
                        ->label('Expense Category')
                        ->exists('expense_categories', 'id')
                        ->searchable()
                        ->preload()
                        ->nullable()
                        ->required()
                        ->default(null),

                    Textarea::make('description')->rows(5)->maxLength(600)->helperText("Maximum 600 Characters")->required(),

                    TextInput::make('amount')->numeric()->prefix('$')->default(0)->required(),

                    DatePicker::make('expense_date')->native(false)->format('d-m-Y')->required(),
                ]),
        ];
    }

    /**
     * @return array<mixed>
     */
    public static function getTableColumns(): array
    {
        return [
            TextColumn::make('reference')->sortable()->searchable(),

            TextColumn::make('category.name')->label("Expense Category")->numeric()->sortable()->searchable(),

            TextColumn::make('description')->limit(120)->sortable()->searchable(),

            TextColumn::make('amount')->money('USD')->sortable(),

            TextColumn::make('expense_date')->date()->sortable(),

            TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}

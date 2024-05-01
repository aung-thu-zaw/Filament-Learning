<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages\ListCategories;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Inventory';

    public static function form(Form $form): Form
    {
        return $form->schema(Category::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(Category::getTableColumns())
            ->defaultSort('id', 'desc')
            ->actions([
                EditAction::make(),
                DeleteAction::make()->action(function ($data, $record) {
                    if ($record->products->count() > 0) {
                        Notification::make()
                            ->danger()
                            ->title('Category is in use.')
                            ->body('Category is use by products.')
                            ->send();

                        return;
                    }

                    $record->delete();

                    Notification::make()
                        ->success()
                        ->title('Deleted')
                        ->send();
                }),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCategories::route('/'),
        ];
    }
}

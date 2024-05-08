<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use App\Filament\Resources\ProductResource\Pages\EditProduct;
use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Filament\Resources\ProductResource\Pages\ViewProduct;
use App\Models\Product;
use Filament\Tables\Actions\Action;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Inventory';

    public static function form(Form $form): Form
    {
        return $form->schema(Product::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(Product::getTableColumns())
            ->filtersTriggerAction(fn ($action) => $action->button()->label('Filters'))
            ->filters([
                SelectFilter::make('unit')->label('Units')->relationship('unit', 'name')->multiple()->searchable()->preload(),

                SelectFilter::make('discount_type')
                    ->label('Discount')
                    ->options([
                        null => 'No Discount',
                        'percentage' => 'Percentage',
                        'fixed' => 'Fixed',
                    ]),
            ])
            ->defaultSort('id', 'desc')
            ->actions([
                ActionGroup::make([
                    EditAction::make(),

                    DeleteAction::make(),

                    ViewAction::make(),
                ]),

                ActionGroup::make([

                    Action::make('inactive')
                        ->icon('heroicon-o-check-circle')
                        ->color('danger')
                        ->visible(fn ($record) => $record->status === 'published' || $record->status !== 'draft')
                        ->requiresConfirmation()
                        ->action(fn (Product $record) => $record->inactive())
                        ->after(function () {
                            Notification::make()->success()->title('This product was inactive.')->send();
                        }),

                    Action::make('published')
                        ->label('Publish')
                        ->icon('heroicon-o-check-circle')
                        ->visible(fn ($record) => $record->status === 'inactive' || $record->status === 'draft')
                        ->color('success')
                        ->action(fn (Product $record) => $record->published())
                        ->after(function () {
                            Notification::make()->success()->title('This product was published.')->send();
                        }),
                ])->icon("heroicon-o-cog-6-tooth"),
            ])
            ->headerActions([
                Action::make('export')
                    ->tooltip("This will export all records visible in the table. Adjust filters to export a subset of records.")
                    ->action(function ($livewire) {
                        dd($livewire->getFilteredTableQuery()->count());
                    }),
            ])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([Section::make()->schema([TextEntry::make('name')])]);
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
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
            'view' => ViewProduct::route('/{record}'),
        ];
    }
}

<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'draft' => Tab::make('Draft')->modifyQueryUsing(function ($query) {
                return $query->where("status", "draft");
            }),
            'published' => Tab::make('Published')->modifyQueryUsing(function ($query) {
                return $query->where("status", "published");
            }),
            'inactive' => Tab::make('Inactive')->modifyQueryUsing(function ($query) {
                return $query->where("status", "inactive");
            }),
        ];
    }
}

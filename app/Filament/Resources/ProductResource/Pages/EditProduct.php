<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\AdditionalImage;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        $record->update([
            "name" => $data["name"],
            "slug" => $data["slug"],
            "category_id" => $data["category_id"],
            "brand_id" => $data["brand_id"],
            "warehouse_id" => $data["warehouse_id"],
            "description" => $data["description"],
            "unit_id" => $data["unit_id"],
            "sku" => $data["sku"],
            "warranty_id" => $data["warranty_id"],
            "manufactured_date" => $data["manufactured_date"],
            "expired_date" => $data["expired_date"],
            "price" => $data["price"],
            "qty" => $data["qty"],
            "stock_alert" => $data["stock_alert"],
            "discount_type" => $data["discount_type"],
            "discount_start_date" => $data["discount_start_date"],
            "discount_end_date" => $data["discount_end_date"],
            "discount_price" => $data["discount_price"],
            "image" => $data["image"],
        ]);

        if(isset($data["additional_images"])) {

            foreach($data["additional_images"] as $image) {
                AdditionalImage::create([
                    'product_id' => $record->id,
                    'image' => $image,
                ]);
            }
        }

        return $record;
    }
}

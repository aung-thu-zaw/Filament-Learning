<?php

namespace App\Models;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Brand extends Model
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
        return  [
              Section::make()
              ->columns(2)
              ->schema([
                  TextInput::make('name')
                      ->label("Brand Name")
                      ->unique(ignoreRecord: true)
                      ->required()
                      ->live(onBlur: true)
                      ->afterStateUpdated(function (string $operation, $state, Set $set) {
                          if($operation !== "create") {
                              return;
                          }

                          $set('slug', Str::slug($state));
                      }),

                 TextInput::make('slug')
                      ->unique(ignoreRecord: true)
                      ->required(),

                  FileUpload::make('logo')
                      ->label("Brand Logo")
                      ->image()
                      ->disk('public')
                      ->directory('brands')
                      ->preserveFilenames()
                      ->maxSize(1024 * 1024 * 2)
                      ->required()
                      ->columnSpanFull(),

                 Toggle::make('status')
                      ->required(),
              ])
          ];
    }
}

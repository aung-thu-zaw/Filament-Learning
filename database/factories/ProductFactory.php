<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Warehouse;
use App\Models\Warranty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $warranties = Warranty::pluck("id")->toArray();
        $units = Unit::pluck("id")->toArray();
        $warehouses = Warehouse::pluck("id")->toArray();
        $brands = Brand::pluck("id")->toArray();
        $categories = Category::pluck("id")->toArray();

        return [
            "warranty_id" => fake()->randomElement($warranties),
            "unit_id" => fake()->randomElement($units),
            "warehouse_id" => fake()->randomElement($warehouses),
            "brand_id" => fake()->randomElement($brands),
            "category_id" => fake()->randomElement($categories),
            "name" => fake()->unique()->sentence(),
            "slug" => fake()->unique()->slug(),
            "description" => fake()->paragraph(),
            "code" => uniqid(),
            "price" => fake()->randomNumber(4, true),
            // "discount_type"=>fake()->,
            // "discount_price"=>fake()->,
            // "discount_start_date"=>fake()->,
            // "discount_end_date"=>fake()->,
            "qty" => fake()->numberBetween(10, 50),
            "stock_alert" => fake()->numberBetween(5, 10),
            "sku" => uniqid(),
            "image" => fake()->imageUrl(),
            "status" => fake()->randomElement(['draft', 'published']),
            "manufactured_date" => fake()->dateTimeBetween('-1 year', '+1 week'),
            "expired_date" => fake()->dateTimeBetween('+3 months', '+5 years'),
        ];
    }
}

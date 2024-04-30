<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warranty>
 */
class WarrantyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->unique()->name(),
            "duration" => fake()->numberBetween(1, 10),
            "periods" => fake()->randomElement(['week', 'month', 'year']),
            "description" => fake()->paragraph(),
            "status" => fake()->boolean(),
        ];
    }
}

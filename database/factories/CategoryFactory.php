<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // $admins = User::where("role", "admin")->pluck("id")->toArray();

        return [
            'parent_id' => null,
            'created_by' => 1,
            'name' => fake()->unique()->name(),
            'image' => fake()->imageUrl(),
            'description' => fake()->sentence(),
            'status' => fake()->boolean(),
            'created_at' => fake()->dateTimeBetween('-4 months', now()),
        ];
    }
}

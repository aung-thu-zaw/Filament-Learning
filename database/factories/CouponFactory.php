<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomDays = fake()->numberBetween(3, 30);
        $randomMonths = fake()->numberBetween(1, 4);

        return [
            'code' => fake()->unique()->word(),
            'description' => fake()->sentence(),
            'type' => fake()->randomElement(['percentage', 'fixed']),
            'value' => fake()->numberBetween(10, 500),
            'min_spend' => fake()->numberBetween(500, 1000),
            'usage_limit' => fake()->numberBetween(10, 100),
            'start_date' => fake()->dateTimeBetween(now(), "+ $randomDays days")->format('Y-m-d'),
            'end_date' => fake()->dateTimeBetween(now(), "+ $randomMonths months")->format('Y-m-d'),
            'status' => fake()->boolean(),
            'created_at' => fake()->dateTimeBetween('-4 months', now()),
        ];
    }
}

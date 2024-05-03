<?php

namespace Database\Factories;

use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $categories = ExpenseCategory::pluck("id")->toArray();

        return [
            "reference" => uniqid(),
            "expense_category_id" => fake()->randomElement($categories),
            "amount" => fake()->numberBetween(20, 99999),
            "description" => fake()->paragraph(),
            "expense_date" => fake()->dateTimeBetween('-1 year', '+ 2 weeks'),
        ];
    }
}

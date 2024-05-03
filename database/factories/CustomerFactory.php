<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;
use NunoMaduro\Collision\Adapters\Phpunit\State;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_id' => Country::factory(),
            'province_id' => function (array $attributes) {
                return Province::where('country_id', $attributes['country_id'])->inRandomOrder()->first()->id;
            },
            'city_id' => function (array $attributes) {
                return City::where('province_id', $attributes['province_id'])->inRandomOrder()->first()->id;
            },
            'avatar' => $this->faker->imageUrl(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'address' => $this->faker->address(),
            'description' => $this->faker->paragraph(),
        ];
    }
}

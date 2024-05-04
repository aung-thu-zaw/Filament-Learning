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
        $countries = Country::pluck("id")->toArray();

        return [
            'country_id' => fake()->randomElement($countries),
            'province_id' => function (array $attributes) {
                $province = Province::where('country_id', $attributes['country_id'])->inRandomOrder()->first();
                return $province ? $province->id : 1;
            },
            'city_id' => function (array $attributes) {
                $city = City::where('province_id', $attributes['province_id'])->inRandomOrder()->first();
                return $city ? $city->id : 1;
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

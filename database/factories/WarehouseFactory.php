<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warehouse>
 */
class WarehouseFactory extends Factory
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
            'name' => fake()->name(),
            'contact_person' => fake()->name(),
            'contact_email' => fake()->unique()->email(),
            'contact_phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'zip_code' => fake()->postcode(),
            'status' => fake()->boolean(),
        ];
    }
}

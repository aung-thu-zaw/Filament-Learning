<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countries = Country::pluck("id")->toArray();
        $provinces = Province::pluck("id")->toArray();

        return [
            "country_id"=>fake()->randomElement($countries),
            "province_id"=>fake()->randomElement($provinces),
            "name"=>fake()->unique()->city(),
            "latitude"=>fake()->latitude(),
            "longitude"=>fake()->longitude(),
        ];
    }
}

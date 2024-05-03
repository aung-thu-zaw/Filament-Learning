<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = collect([
            [
                'name' => 'United States',
                'iso_code' => 'US',
                'currency' => 'USD',
            ],
            [
                'name' => 'United Kingdom',
                'iso_code' => 'GB',
                'currency' => 'GBP',
            ],
            [
                'name' => 'Germany',
                'iso_code' => 'DE',
                'currency' => 'EUR',
            ],
            [
                'name' => 'France',
                'iso_code' => 'FR',
                'currency' => 'EUR',
            ],
            [
                'name' => 'Japan',
                'iso_code' => 'JP',
                'currency' => 'JPY',
            ],
            [
                'name' => 'China',
                'iso_code' => 'CN',
                'currency' => 'CNY',
            ],
            [
                'name' => 'Canada',
                'iso_code' => 'CA',
                'currency' => 'CAD',
            ],
            [
                'name' => 'Australia',
                'iso_code' => 'AU',
                'currency' => 'AUD',
            ],
            [
                'name' => 'Brazil',
                'iso_code' => 'BR',
                'currency' => 'BRL',
            ],
            [
                'name' => 'India',
                'iso_code' => 'IN',
                'currency' => 'INR',
            ],
        ]);

        $countries->each(fn ($country) => Country::factory()->create($country));
    }
}

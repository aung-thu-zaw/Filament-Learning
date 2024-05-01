<?php

namespace Database\Seeders;

use App\Models\Warranty;
use Illuminate\Database\Seeder;

class WarrantySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warranties = collect([
            [
                'name' => 'Limited Warranty',
                'duration' => 1,
                'periods' => 'year',
                'description' => 'Standard one-year limited warranty.',
            ],

            [
                'name' => 'Extended Warranty',
                'duration' => 2,
                'periods' => 'year',
                'description' => 'Extended two-year warranty for additional coverage.',
            ],

            [
                'name' => 'Lifetime Warranty',
                'duration' => 999,
                'periods' => 'year',
                'description' => 'Lifetime warranty ensuring long-term product support.',
            ],

            [
                'name' => 'Accidental Damage Protection',
                'duration' => 3,
                'periods' => 'year',
                'description' => 'Coverage against accidental damage for three years.',
            ],

            [
                'name' => 'Battery Replacement Warranty',
                'duration' => 1,
                'periods' => 'year',
                'description' => 'Warranty covering battery replacement for one year.',
            ],

            [
                'name' => 'Manufacturer Refurbishment Warranty',
                'duration' => 6,
                'periods' => 'month',
                'description' => 'Warranty for manufacturer refurbished products for six months.',
            ],

            [
                'name' => 'On-site Service Warranty',
                'duration' => 3,
                'periods' => 'year',
                'description' => 'Three-year on-site service warranty for convenience.',
            ],

            [
                'name' => 'Software Update Assurance',
                'duration' => 1,
                'periods' => 'year',
                'description' => 'Annual software update assurance ensuring access to the latest features.',
            ],

            [
                'name' => 'Waterproof Warranty',
                'duration' => 5,
                'periods' => 'year',
                'description' => 'Five-year warranty covering waterproofing for peace of mind.',
            ],

            [
                'name' => 'Extended Battery Life Guarantee',
                'duration' => 2,
                'periods' => 'year',
                'description' => 'Guaranteed extended battery life for two years.',
            ],
        ]);

        $warranties->each(fn ($warranty) => Warranty::factory()->create($warranty));
    }
}

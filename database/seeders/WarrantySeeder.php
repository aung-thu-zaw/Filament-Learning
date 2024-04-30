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
        Warranty::factory()->create([
            'name' => 'Limited Warranty',
            'duration' => 1,
            'periods' => 'year',
            'description' => 'Standard one-year limited warranty.',
        ]);

        Warranty::factory()->create([
            'name' => 'Extended Warranty',
            'duration' => 2,
            'periods' => 'year',
            'description' => 'Extended two-year warranty for additional coverage.',
        ]);

        Warranty::factory()->create([
            'name' => 'Lifetime Warranty',
            'duration' => 999,
            'periods' => 'year',
            'description' => 'Lifetime warranty ensuring long-term product support.',
        ]);

        Warranty::factory()->create([
            'name' => 'Accidental Damage Protection',
            'duration' => 3,
            'periods' => 'year',
            'description' => 'Coverage against accidental damage for three years.',
        ]);

        Warranty::factory()->create([
            'name' => 'Battery Replacement Warranty',
            'duration' => 1,
            'periods' => 'year',
            'description' => 'Warranty covering battery replacement for one year.',
        ]);

        Warranty::factory()->create([
            'name' => 'Manufacturer Refurbishment Warranty',
            'duration' => 6,
            'periods' => 'month',
            'description' => 'Warranty for manufacturer refurbished products for six months.',
        ]);

        Warranty::factory()->create([
            'name' => 'On-site Service Warranty',
            'duration' => 3,
            'periods' => 'year',
            'description' => 'Three-year on-site service warranty for convenience.',
        ]);

        Warranty::factory()->create([
            'name' => 'Software Update Assurance',
            'duration' => 1,
            'periods' => 'year',
            'description' => 'Annual software update assurance ensuring access to the latest features.',
        ]);

        Warranty::factory()->create([
            'name' => 'Waterproof Warranty',
            'duration' => 5,
            'periods' => 'year',
            'description' => 'Five-year warranty covering waterproofing for peace of mind.',
        ]);

        Warranty::factory()->create([
            'name' => 'Extended Battery Life Guarantee',
            'duration' => 2,
            'periods' => 'year',
            'description' => 'Guaranteed extended battery life for two years.',
        ]);
    }
}

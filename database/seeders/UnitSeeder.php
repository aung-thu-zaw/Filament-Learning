<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::factory()->create([
            'name' => 'Kilogram',
            'short_name' => 'kg',
        ]);

        Unit::factory()->create([
            'name' => 'Gram',
            'short_name' => 'g',
        ]);

        Unit::factory()->create([
            'name' => 'Liter',
            'short_name' => 'L',
        ]);

        Unit::factory()->create([
            'name' => 'Milliliter',
            'short_name' => 'mL',
        ]);

        Unit::factory()->create([
            'name' => 'Meter',
            'short_name' => 'm',
        ]);

        Unit::factory()->create([
            'name' => 'Centimeter',
            'short_name' => 'cm',
        ]);

        Unit::factory()->create([
            'name' => 'Piece',
            'short_name' => 'pcs',
        ]);

        Unit::factory()->create([
            'name' => 'Dozen',
            'short_name' => 'dz',
        ]);

        Unit::factory()->create([
            'name' => 'Pack',
            'short_name' => 'pk',
        ]);

        Unit::factory()->create([
            'name' => 'Box',
            'short_name' => 'box',
        ]);
    }
}

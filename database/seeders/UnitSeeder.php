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
        $units = collect([
            [
                'name' => 'Kilogram',
                'short_name' => 'kg',
            ],
            [
                'name' => 'Gram',
                'short_name' => 'g',
            ],
            [
                'name' => 'Liter',
                'short_name' => 'L',
            ],
            [
                'name' => 'Milliliter',
                'short_name' => 'mL',
            ],
            [
                'name' => 'Meter',
                'short_name' => 'm',
            ],
            [
                'name' => 'Centimeter',
                'short_name' => 'cm',
            ],
            [
                'name' => 'Piece',
                'short_name' => 'pcs',
            ],
            [
                'name' => 'Dozen',
                'short_name' => 'dz',
            ],
            [
                'name' => 'Pack',
                'short_name' => 'pk',
            ],
            [
                'name' => 'Box',
                'short_name' => 'box',
            ],
        ]);

        $units->each(fn($unit) => Unit::factory()->create($unit));
    }
}

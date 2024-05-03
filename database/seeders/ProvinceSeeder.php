<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = collect([
            // United States
            ['country_id' => 1,'name' => 'California', 'iso_code' => 'CA'],
            ['country_id' => 1,'name' => 'Texas', 'iso_code' => 'TX'],
            ['country_id' => 1,'name' => 'New York', 'iso_code' => 'NY'],
            ['country_id' => 1,'name' => 'Florida', 'iso_code' => 'FL'],
            ['country_id' => 1,'name' => 'Illinois', 'iso_code' => 'IL'],

            // United Kingdom
            ['country_id' => 2,'name' => 'England', 'iso_code' => 'ENG'],
            ['country_id' => 2,'name' => 'Scotland', 'iso_code' => 'SCO'],
            ['country_id' => 2,'name' => 'Wales', 'iso_code' => 'WAL'],
            ['country_id' => 2,'name' => 'Northern Ireland', 'iso_code' => 'NIR'],
            ['country_id' => 2,'name' => 'Cornwall', 'iso_code' => 'CRN'],

            // Germany
            ['country_id' => 3,'name' => 'Bavaria', 'iso_code' => 'BY'],
            ['country_id' => 3,'name' => 'North Rhine-Westphalia', 'iso_code' => 'NW'],
            ['country_id' => 3,'name' => 'Baden-Württemberg', 'iso_code' => 'BW'],
            ['country_id' => 3,'name' => 'Lower Saxony', 'iso_code' => 'NS'],
            ['country_id' => 3,'name' => 'Hesse', 'iso_code' => 'HE'],

            // France
            ['country_id' => 4,'name' => 'Île-de-France', 'iso_code' => 'IDF'],
            ['country_id' => 4,'name' => 'Provence-Alpes-Côte d\'Azur', 'iso_code' => 'PAC'],
            ['country_id' => 4,'name' => 'Occitanie', 'iso_code' => 'OCC'],
            ['country_id' => 4,'name' => 'Nouvelle-Aquitaine', 'iso_code' => 'NAQ'],
            ['country_id' => 4,'name' => 'Auvergne-Rhône-Alpes', 'iso_code' => 'ARA'],

            // Japan
            ['country_id' => 5,'name' => 'Tokyo', 'iso_code' => '53'],
            ['country_id' => 5,'name' => 'Osaka', 'iso_code' => '27'],
            ['country_id' => 5,'name' => 'Kanagawa', 'iso_code' => '54'],
            ['country_id' => 5,'name' => 'Aichi', 'iso_code' => '23'],
            ['country_id' => 5,'name' => 'Saitama', 'iso_code' => '11'],

            // China
            ['country_id' => 6,'name' => 'Guangdong', 'iso_code' => 'GD'],
            ['country_id' => 6,'name' => 'Shandong', 'iso_code' => 'SD'],
            ['country_id' => 6,'name' => 'Henan', 'iso_code' => 'HA'],
            ['country_id' => 6,'name' => 'Sichuan', 'iso_code' => 'SC'],
            ['country_id' => 6,'name' => 'Jiangsu', 'iso_code' => 'JS'],

            // Canada
            ['country_id' => 7,'name' => 'Ontario', 'iso_code' => 'ON'],
            ['country_id' => 7,'name' => 'Quebec', 'iso_code' => 'QC'],
            ['country_id' => 7,'name' => 'British Columbia', 'iso_code' => 'BC'],
            ['country_id' => 7,'name' => 'Alberta', 'iso_code' => 'AB'],
            ['country_id' => 7,'name' => 'Manitoba', 'iso_code' => 'MB'],

            // Australia
            ['country_id' => 8,'name' => 'New South Wales', 'iso_code' => 'NSW'],
            ['country_id' => 8,'name' => 'Queensland', 'iso_code' => 'QLD'],
            ['country_id' => 8,'name' => 'Victoria', 'iso_code' => 'VIC'],
            ['country_id' => 8,'name' => 'Western Australia', 'iso_code' => 'WA'],
            ['country_id' => 8,'name' => 'South Australia', 'iso_code' => 'SA'],

            // Brazil
            ['country_id' => 9,'name' => 'São Paulo', 'iso_code' => 'SP'],
            ['country_id' => 9,'name' => 'Rio de Janeiro', 'iso_code' => 'RJ'],
            ['country_id' => 9,'name' => 'Minas Gerais', 'iso_code' => 'MG'],
            ['country_id' => 9,'name' => 'Bahia', 'iso_code' => 'BA'],
            ['country_id' => 9,'name' => 'Paraná', 'iso_code' => 'PR'],

            // India
            ['country_id' => 10,'name' => 'Uttar Pradesh', 'iso_code' => 'UP'],
            ['country_id' => 10,'name' => 'Maharashtra', 'iso_code' => 'MH'],
            ['country_id' => 10,'name' => 'Bihar', 'iso_code' => 'BR'],
            ['country_id' => 10,'name' => 'West Bengal', 'iso_code' => 'WB'],
            ['country_id' => 10,'name' => 'Madhya Pradesh', 'iso_code' => 'MP'],
        ]);

        $provinces->each(fn ($province) => Province::factory()->create($province));
    }
}

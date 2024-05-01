<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = collect([
            [
                'name' => 'Samsung',
                'logo' => 'https://freepngimg.com/thumb/logo/73159-samsung-s7-s6-logo-electronics-galaxy-thumb.png',
            ],

            [
                'name' => 'Apple',
                'logo' => 'https://freepngimg.com/thumb/apple/58851-logo-watch-apple-free-frame-thumb.png',
            ],

            [
                'name' => 'Adidas',
                'logo' => 'https://freepngimg.com/thumb/adidas/58264-originals-adidas-smith-stan-logo-store-thumb.png',
            ],

            [
                'name' => 'Nike',
                'logo' => 'https://www.logo.wine/a/logo/Nike%2C_Inc./Nike%2C_Inc.-Nike-Logo.wine.svg',
            ],

            [
                'name' => 'Sony',
                'logo' => 'https://www.logo.wine/a/logo/Sony/Sony-Logo.wine.svg',
            ],

            [
                'name' => 'Microsoft',
                'logo' => 'https://www.logo.wine/a/logo/Microsoft/Microsoft-Logo.wine.svg',
            ],

            [
                'name' => 'Coca-Cola',
                'logo' => 'https://download.logo.wine/logo/Coca-Cola/Coca-Cola-Logo.wine.png',
            ],

            [
                'name' => 'Pepsi',
                'logo' => 'https://www.logo.wine/a/logo/Pepsi/Pepsi-Logo.wine.svg',
            ],

            [
                'name' => 'G-Shock',
                'logo' => 'https://www.logo.wine/a/logo/G-Shock/G-Shock-Logo.wine.svg',
            ],

            [
                'name' => 'Gucci',
                'logo' => 'https://www.logo.wine/a/logo/Gucci/Gucci-Logo.wine.svg',
            ],

            [
                'name' => 'Chanel',
                'logo' => 'https://www.logo.wine/a/logo/Chanel/Chanel-Logo.wine.svg',
            ],

            [
                'name' => 'Louis Vuitton',
                'logo' => 'https://www.logo.wine/a/logo/Louis_Vuitton/Louis_Vuitton-Logo.wine.svg',
            ],

            [
                'name' => 'Dell',
                'logo' => 'https://www.logo.wine/a/logo/Dell/Dell-Logo.wine.svg',
            ],

            [
                'name' => 'HP',
                'logo' => 'https://www.logo.wine/a/logo/Hewlett-Packard/Hewlett-Packard-Logo.wine.svg',
            ],

            [
                'name' => 'Lenovo',
                'logo' => 'https://www.logo.wine/a/logo/Lenovo_Vibe_K4_Note/Lenovo_Vibe_K4_Note-Logo.wine.svg',
            ],

            [
                'name' => 'Canon',
                'logo' => 'https://www.logo.wine/a/logo/Canon_Inc./Canon_Inc.-Logo.wine.svg',
            ],

            [
                'name' => 'Panasonic',
                'logo' => 'https://www.logo.wine/a/logo/Panasonic/Panasonic-Logo.wine.svg',
            ],

            [
                'name' => 'LG',
                'logo' => 'https://www.logo.wine/a/logo/LG_Electronics/LG_Electronics-Logo.wine.svg',
            ],

            [
                'name' => 'ASUS',
                'logo' => 'https://www.logo.wine/a/logo/Asus/Asus-Logo.wine.svg',
            ],

            [
                'name' => 'Intel',
                'logo' => 'https://www.logo.wine/a/logo/Intel/Intel-Logo.wine.svg',
            ],

            [
                'name' => 'AMD',
                'logo' => 'https://www.logo.wine/a/logo/Ryzen/Ryzen-Logo.wine.svg',
            ],

            [
                'name' => 'Nestlé',
                'logo' => 'https://www.logo.wine/a/logo/Nestl%C3%A9/Nestl%C3%A9-Logo.wine.svg',
            ],

            [
                'name' => 'Calvin Klein',
                'logo' => 'https://www.logo.wine/a/logo/Calvin_Klein_(company)/Calvin_Klein_(company)-Logo.wine.svg',
            ],

            [
                'name' => 'Oral-B',
                'logo' => 'https://www.logo.wine/a/logo/Oral-B/Oral-B-Logo.wine.svg',
            ],

            [
                'name' => 'Johnson & Johnson',
                'logo' => 'https://www.logo.wine/a/logo/Johnson_%26_Johnson/Johnson_%26_Johnson-Logo.wine.svg',
            ],

            [
                'name' => "Kellogg's",
                'logo' => "https://www.logo.wine/a/logo/Kellogg's/Kellogg's-Logo.wine.svg",
            ],
        ]);

        $brands->each(fn ($brand) => Brand::factory()->create($brand));
    }
}

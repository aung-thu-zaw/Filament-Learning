<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ===== Parent Categories =====
        Category::factory()->create([
            'name' => 'Apparel',
            'image' => 'https://img.freepik.com/free-photo/shirt-mockup-concept-with-plain-clothing_23-2149448749.jpg'
        ]);

        Category::factory()->create([
            'name' => 'Electronics',
            'image' => 'https://img.freepik.com/premium-photo/futuristic-gadgets-showcase-lineup-sleek-modern-technological-devices_977107-683.jpg'
        ]);

        Category::factory()->create([
            'name' => 'Beauty & Personal Care',
            'image' => 'https://img.freepik.com/free-photo/still-life-care-products_23-2149371308.jpg'
        ]);

        Category::factory()->create([
            'name' => 'Home & Kitchen',
            'image' => 'https://img.freepik.com/free-photo/kitchen-utensils-composition-arrangement_23-2149491431.jpg?size=626&ext=jpg&ga=GA1.1.1224184972.1713916800&semt=ais'
        ]);

        Category::factory()->create([
            'name' => 'Sports & Outdoors',
            'image' => 'https://media.istockphoto.com/id/1136317339/photo/sports-equipment-on-floor.jpg?s=612x612&w=0&k=20&c=-aI8u_Se89IC-HJZYH724ei5z-bIcSvRW6qUwyMtRyE='
        ]);


        // ===== Second Child Categories =====

        // 1.Apparel
        Category::factory()->create([
            'parent_id' => 1,
            'name' => 'Tops',
            'image' => 'https://media.istockphoto.com/id/916092484/photo/women-clothes-hanging-on-hangers-clothing-rails-fashion-design.jpg?s=612x612&w=0&k=20&c=fUpcbOITkQqitglZfgJkWO3py-jsbuhc8eZfb4sdrfE='
         ]);

        Category::factory()->create([
            'parent_id' => 1,
            'name' => 'Bottoms',
            'image' => 'https://media.istockphoto.com/id/1409456606/photo/blank-black-man-pants-mockup-front-and-back-view.jpg?s=612x612&w=0&k=20&c=-3XcM1S37ue8gG96ju2Mbdv5sXow-vfEf1cmT4rLzVQ='
         ]);

        Category::factory()->create([
            'parent_id' => 1,
            'name' => 'Dresses',
            'image' => 'https://media.istockphoto.com/id/656980138/photo/colorful-clorhes-on-racks-in-a-fashion-boutique.jpg?s=612x612&w=0&k=20&c=w96wcXG3lnt4r_Uq6RduTbvw6RyMKDXj6jE0CbN7EeU='
         ]);

        Category::factory()->create([
            'parent_id' => 1,
            'name' => 'Outerwear',
            'image' => 'https://media.istockphoto.com/id/136568907/photo/a-purple-winter-parka-for-a-fashion-image.jpg?s=612x612&w=0&k=20&c=fK2_No3CvQnqIY9ti2giLz2w8IaUmSrptu2iSNxd93g='
         ]);

        Category::factory()->create([
            'parent_id' => 1,
            'name' => 'Active wear',
            'image' => 'https://img.freepik.com/free-photo/friends-with-colorful-outfits-posing_23-2149348502.jpg'
         ]);

        Category::factory()->create([
            'parent_id' => 1,
            'name' => 'Sleepwear',
            'image' => 'https://r2.erweima.ai/imgcompressed/compressed_1b07fae13729e3651e4bb1cabe08cce0.webp'
         ]);

        Category::factory()->create([
            'parent_id' => 1,
            'name' => 'Swimwear',
            'image' => 'https://media.glamour.com/photos/596646df42701856831423c4/master/w_2560%2Cc_limit/shopbop-solid-striped-horizontal.jpg'
         ]);

        Category::factory()->create([
            'parent_id' => 1,
            'name' => 'Accessories',
            'image' => 'https://img.freepik.com/free-photo/top-view-accessoires-travel-with-women-clothing-concept-white-mobilephone-watch-bag-hat-map-camera-necklace-trousers-sunglasses-white-wood-table_1921-106.jpg'
         ]);


        // 2.Electronics
        Category::factory()->create([
            'parent_id' => 2,
            'name' => 'Mobile Phones',
            'image' => 'https://www.dennemeyer.com/fileadmin/a/blog/Everyday_IP_Spreading_the_word_about_mobile_phones/Everyday-IP_Spreading-the-word-about-mobile-phones_12.jpg'
         ]);

        Category::factory()->create([
            'parent_id' => 2,
            'name' => 'Laptops & Computers',
            'image' => 'https://i.ytimg.com/vi/ysrYdiz1KlY/maxresdefault.jpg'
         ]);

        Category::factory()->create([
            'parent_id' => 2,
            'name' => 'Tablets & E-readers',
            'image' => 'https://media2.s-nbcnews.com/i/MSNBC/Components/Photo/_new/101119-e-readers-hmed2p.jpg'
         ]);

        Category::factory()->create([
            'parent_id' => 2,
            'name' => 'TVs & Home Entertainment',
            'image' => 'https://img.freepik.com/premium-vector/home-theatre-tv-set-system-interior-big-modern-multimedia-system-home-theatre-living-room-realistic-concept_80590-7305.jpg'
         ]);

        Category::factory()->create([
            'parent_id' => 2,
            'name' => 'Cameras & Photography'
         ]);

        Category::factory()->create([
            'parent_id' => 2,
            'name' => 'Audio & Headphones'
         ]);

        Category::factory()->create([
            'parent_id' => 2,
            'name' => 'Wearable Technology'
         ]);

        Category::factory()->create([
            'parent_id' => 2,
            'name' => 'Gaming Consoles & Accessories'
         ]);


        // 3.Beauty & Personal Care
        Category::factory()->create([
            'parent_id' => 3,
            'name' => 'Skincare'
         ]);

        Category::factory()->create([
            'parent_id' => 3,
            'name' => 'Makeup'
         ]);

        Category::factory()->create([
            'parent_id' => 3,
            'name' => 'Haircare'
         ]);

        Category::factory()->create([
            'parent_id' => 3,
            'name' => 'Fragrances'
         ]);

        Category::factory()->create([
            'parent_id' => 3,
            'name' => 'Bath & Body'
         ]);

        Category::factory()->create([
            'parent_id' => 3,
            'name' => "Men's Grooming"
         ]);

        Category::factory()->create([
            'parent_id' => 3,
            'name' => 'Oral Care'
         ]);

        Category::factory()->create([
            'parent_id' => 3,
            'name' => 'Beauty Tools & Accessories'
         ]);


        // 4.Home & Kitchen
        Category::factory()->create([
            'parent_id' => 4,
            'name' => 'Furniture'
         ]);

        Category::factory()->create([
            'parent_id' => 4,
            'name' => 'Kitchen Appliances'
         ]);

        Category::factory()->create([
            'parent_id' => 4,
            'name' => 'Cookware & Bakeware'
         ]);

        Category::factory()->create([
            'parent_id' => 4,
            'name' => 'Home Décor'
         ]);

        Category::factory()->create([
            'parent_id' => 4,
            'name' => 'Bedding & Linens'
         ]);

        Category::factory()->create([
            'parent_id' => 4,
            'name' => 'Storage & Organization'
         ]);

        Category::factory()->create([
            'parent_id' => 4,
            'name' => 'Cleaning Supplies'
         ]);

        Category::factory()->create([
            'parent_id' => 4,
            'name' => 'Outdoor Living'
         ]);


        // 5.Sports & Outdoors
        Category::factory()->create([
            'parent_id' => 5,
            'name' => 'Exercise & Fitness Equipment'
         ]);

        Category::factory()->create([
            'parent_id' => 5,
            'name' => 'Activewear & Sports Clothing'
         ]);

        Category::factory()->create([
            'parent_id' => 5,
            'name' => 'Footwear'
         ]);

        Category::factory()->create([
            'parent_id' => 5,
            'name' => 'Outdoor Recreation'
         ]);

        Category::factory()->create([
            'parent_id' => 5,
            'name' => 'Team Sports'
         ]);

        Category::factory()->create([
            'parent_id' => 5,
            'name' => 'Water Sports'
         ]);

        Category::factory()->create([
            'parent_id' => 5,
            'name' => 'Cycling & Bike Accessories'
         ]);

        Category::factory()->create([
            'parent_id' => 5,
            'name' => 'Hunting & Fishing Gear'
         ]);

    }
}

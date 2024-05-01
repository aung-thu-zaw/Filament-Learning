<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect([

            // Parent Categories
            [
                'name' => 'Apparel',
                'image' => 'https://img.freepik.com/free-photo/shirt-mockup-concept-with-plain-clothing_23-2149448749.jpg',
            ],

            [
                'name' => 'Electronics',
                'image' => 'https://img.freepik.com/premium-photo/futuristic-gadgets-showcase-lineup-sleek-modern-technological-devices_977107-683.jpg',
            ],

            [
                'name' => 'Beauty & Personal Care',
                'image' => 'https://img.freepik.com/free-photo/still-life-care-products_23-2149371308.jpg',
            ],

            [
                'name' => 'Home & Kitchen',
                'image' => 'https://img.freepik.com/free-photo/kitchen-utensils-composition-arrangement_23-2149491431.jpg?size=626&ext=jpg&ga=GA1.1.1224184972.1,3916800&semt=ais',
            ],

            [
                'name' => 'Sports & Outdoors',
                'image' => 'https://media.istockphoto.com/id/1136317339/photo/sports-equipment-on-floor.jpg?s=612x612&w=0&k=20&c,aI8u_Se89IC-HJZYH724ei5z-bIcSvRW6qUwyMtRyE=',
            ],

            // Apparel

            [
                'parent_id' => 1,
                'name' => 'Tops',
                'image' => 'https://media.istockphoto.com/id/916092484/photo/women-clothes-hanging-on-hangers-clothing-rails-fashion-design.jpg?s=612x612&w=0&k=20&c=fUpcbOITkQqitglZfgJkWO3py-jsbuhc8eZfb4sdrfE=',
            ],

            [
                'parent_id' => 1,
                'name' => 'Bottoms',
                'image' => 'https://media.istockphoto.com/id/1409456606/photo/blank-black-man-pants-mockup-front-and-back-view.jpg?s=612x612&w=0&k=20&c=-3XcM1S37ue8gG96ju2Mbdv5sXow-vfEf1cmT4rLzVQ=',
            ],

            [
                'parent_id' => 1,
                'name' => 'Dresses',
                'image' => 'https://media.istockphoto.com/id/656980138/photo/colorful-clorhes-on-racks-in-a-fashion-boutique.jpg?s=612x612&w=0&k=20&c=w96wcXG3lnt4r_Uq6RduTbvw6RyMKDXj6jE0CbN7EeU=',
            ],

            [
                'parent_id' => 1,
                'name' => 'Outerwear',
                'image' => 'https://media.istockphoto.com/id/136568907/photo/a-purple-winter-parka-for-a-fashion-image.jpg?s=612x612&w=0&k=20&c=fK2_No3CvQnqIY9ti2giLz2w8IaUmSrptu2iSNxd93g=',
            ],

            [
                'parent_id' => 1,
                'name' => 'Active wear',
                'image' => 'https://img.freepik.com/free-photo/friends-with-colorful-outfits-posing_23-2149348502.jpg',
            ],

            [
                'parent_id' => 1,
                'name' => 'Sleepwear',
                'image' => 'https://r2.erweima.ai/imgcompressed/compressed_1b07fae13729e3651e4bb1cabe08cce0.webp',
            ],

            [
                'parent_id' => 1,
                'name' => 'Swimwear',
                'image' => 'https://media.glamour.com/photos/596646df42701856831423c4/master/w_2560%2Cc_limit/shopbop-solid-striped-horizontal.jpg',
            ],

            [
                'parent_id' => 1,
                'name' => 'Accessories',
                'image' => 'https://img.freepik.com/free-photo/top-view-accessoires-travel-with-women-clothing-concept-white-mobilephone-watch-bag-hat-map-camera-necklace-trousers-sunglasses-white-wood-table_1921-106.jpg',
            ],

            // Electronics

            [
                'parent_id' => 2,
                'name' => 'Mobile Phones',
                'image' => 'https://www.dennemeyer.com/fileadmin/a/blog/Everyday_IP_Spreading_the_word_about_mobile_phones/Everyday-IP_Spreading-the-word-about-mobile-phones_12.jpg',
            ],

            [
                'parent_id' => 2,
                'name' => 'Laptops & Computers',
                'image' => 'https://i.ytimg.com/vi/ysrYdiz1KlY/maxresdefault.jpg',
            ],

            [
                'parent_id' => 2,
                'name' => 'Tablets & E-readers',
                'image' => 'https://media2.s-nbcnews.com/i/MSNBC/Components/Photo/_new/101119-e-readers-hmed2p.jpg',
            ],

            [
                'parent_id' => 2,
                'name' => 'TVs & Home Entertainment',
                'image' => 'https://img.freepik.com/premium-vector/home-theatre-tv-set-system-interior-big-modern-multimedia-system-home-theatre-living-room-realistic-concept_80590-7305.jpg',
            ],

            [
                'parent_id' => 2,
                'name' => 'Cameras & Photography',
            ],

            [
                'parent_id' => 2,
                'name' => 'Audio & Headphones',
            ],

            [
                'parent_id' => 2,
                'name' => 'Wearable Technology',
            ],

            [
                'parent_id' => 2,
                'name' => 'Gaming Consoles & Accessories',
            ],

            // Beauty & Personal Care

            [
                'parent_id' => 3,
                'name' => 'Skincare',
            ],

            [
                'parent_id' => 3,
                'name' => 'Makeup',
            ],

            [
                'parent_id' => 3,
                'name' => 'Haircare',
            ],

            [
                'parent_id' => 3,
                'name' => 'Fragrances',
            ],

            [
                'parent_id' => 3,
                'name' => 'Bath & Body',
            ],

            [
                'parent_id' => 3,
                'name' => "Men's Grooming",
            ],

            [
                'parent_id' => 3,
                'name' => 'Oral Care',
            ],

            [
                'parent_id' => 3,
                'name' => 'Beauty Tools & Accessories',
            ],

            // Home & Kitchen

            [
                'parent_id' => 4,
                'name' => 'Furniture',
            ],

            [
                'parent_id' => 4,
                'name' => 'Kitchen Appliances',
            ],

            [
                'parent_id' => 4,
                'name' => 'Cookware & Bakeware',
            ],

            [
                'parent_id' => 4,
                'name' => 'Home Décor',
            ],

            [
                'parent_id' => 4,
                'name' => 'Bedding & Linens',
            ],

            [
                'parent_id' => 4,
                'name' => 'Storage & Organization',
            ],

            [
                'parent_id' => 4,
                'name' => 'Cleaning Supplies',
            ],

            [
                'parent_id' => 4,
                'name' => 'Outdoor Living',
            ],

            // Sports & Outdoors

            [
                'parent_id' => 5,
                'name' => 'Exercise & Fitness Equipment',
            ],

            [
                'parent_id' => 5,
                'name' => 'Activewear & Sports Clothing',
            ],

            [
                'parent_id' => 5,
                'name' => 'Footwear',
            ],

            [
                'parent_id' => 5,
                'name' => 'Outdoor Recreation',
            ],

            [
                'parent_id' => 5,
                'name' => 'Team Sports',
            ],

            [
                'parent_id' => 5,
                'name' => 'Water Sports',
            ],

            [
                'parent_id' => 5,
                'name' => 'Cycling & Bike Accessories',
            ],

            [
                'parent_id' => 5,
                'name' => 'Hunting & Fishing Gear',
            ],
        ]);

        $categories->each(fn ($category) => Category::factory()->create($category));
    }
}

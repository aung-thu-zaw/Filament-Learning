<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = collect([
            [
                'code' => 'WELCOME15',
                'description' => 'Welcome offer: Get 15% off your first purchase',
                'type' => 'percentage',
                'value' => 15.0,
                'min_spend' => 30.0,
                'usage_limit' => 200,
            ],

            [
                'code' => 'LOYALTY25',
                'description' => 'Loyalty reward: Enjoy 25% off on your next order',
                'type' => 'percentage',
                'value' => 25.0,
                'min_spend' => 50.0,
                'usage_limit' => 100,
            ],

            [
                'code' => 'BACKTOSCHOOL10',
                'description' => 'Back to school sale: Get 10% off on selected items',
                'type' => 'percentage',
                'value' => 10.0,
                'min_spend' => 0.0,
                'usage_limit' => 300,
            ],

            [
                'code' => 'HOLIDAY50',
                'description' => 'Holiday special: Enjoy 50% off on all products',
                'type' => 'percentage',
                'value' => 50.0,
                'min_spend' => 100.0,
                'usage_limit' => null,
            ],

            [
                'code' => 'VIPSHIP',
                'description' => 'VIP members: Free express shipping on all orders',
                'type' => 'fixed',
                'value' => 0.0,
                'min_spend' => 0.0,
                'usage_limit' => null,
            ],

            [
                'code' => 'FLASHSALE30',
                'description' => 'Flash sale: Get 30% off for the next 24 hours',
                'type' => 'percentage',
                'value' => 30.0,
                'min_spend' => 0.0,
                'usage_limit' => 500,
            ],

            [
                'code' => 'BIRTHDAYGIFT',
                'description' => 'Birthday gift: Enjoy a special discount on your birthday',
                'type' => 'percentage',
                'value' => 20.0,
                'min_spend' => 25.0,
                'usage_limit' => 100,
            ],

            [
                'code' => 'CLEARANCE20',
                'description' => 'Clearance sale: Additional 20% off on clearance items',
                'type' => 'percentage',
                'value' => 20.0,
                'min_spend' => 0.0,
                'usage_limit' => 200,
            ],

            [
                'code' => 'REFERRAL10',
                'description' => 'Refer a friend: Get 10% off for each successful referral',
                'type' => 'percentage',
                'value' => 10.0,
                'min_spend' => 50.0,
                'usage_limit' => null,
            ],

            [
                'code' => 'NEWCOLLECTION',
                'description' => 'Introducing new collection: Enjoy special discounts',
                'type' => 'percentage',
                'value' => 15.0,
                'min_spend' => 0.0,
                'usage_limit' => 300,
            ],

            [
                'code' => 'FIRSTORDER10',
                'description' => 'Get 10% off on your first order',
                'type' => 'percentage',
                'value' => 10.0,
                'min_spend' => 50.0,
                'usage_limit' => 100,
            ],

            [
                'code' => 'FREESHIP',
                'description' => 'Free shipping on all orders',
                'type' => 'fixed',
                'value' => 0.0,
                'min_spend' => 50.0,
                'usage_limit' => null,
            ],

            [
                'code' => 'SUMMERSALE20',
                'description' => 'Summer sale: Get 20% off',
                'type' => 'percentage',
                'value' => 20.0,
                'min_spend' => 0.0,
                'usage_limit' => 500,
                'start_date' => now(),
                'end_date' => now()->addMonths(1),
            ],
        ]);

        $coupons->each(fn ($coupon) => Coupon::factory()->create($coupon));
    }
}

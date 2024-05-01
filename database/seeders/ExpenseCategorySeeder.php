<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expenseCategories = collect([
            [
                'name' => 'Rent',
                'description' => 'Expenses related to leasing or renting office space, equipment, or other facilities necessary for business operations.',
            ],
            [
                'name' => 'Utilities',
                'description' => 'Costs associated with essential services such as electricity, water, gas, and internet that are required to maintain business operations.',
            ],
            [
                'name' => 'Salaries & Wages',
                'description' => 'Payments made to employees for their work, including regular salaries, wages, bonuses, and commissions.',
            ],
            [
                'name' => 'Marketing & Advertising',
                'description' => 'Expenditures for promoting the business, including advertising campaigns, digital marketing, social media marketing, and promotional materials.',
            ],
            [
                'name' => 'Supplies & Stationery',
                'description' => 'Costs incurred for purchasing office supplies, stationery, and other consumable items necessary for day-to-day operations.',
            ],
            [
                'name' => 'Equipment Maintenance',
                'description' => 'Expenses related to the maintenance, repair, and servicing of office equipment, machinery, and technology infrastructure.',
            ],
            [
                'name' => 'Travel & Transportation',
                'description' => 'Costs associated with business-related travel, including airfare, accommodation, transportation, meals, and other travel-related expenses.',
            ],
            [
                'name' => 'Insurance',
                'description' => 'Payments made for various types of insurance coverage, such as business insurance, liability insurance, property insurance, and health insurance for employees.',
            ],
            [
                'name' => 'Taxes & Licenses',
                'description' => 'Payments made for business taxes, licenses, permits, and regulatory fees required to operate legally in a particular jurisdiction.',
            ],
            [
                'name' => 'Repairs & Maintenance',
                'description' => 'Expenditures for repairing and maintaining business assets, including buildings, vehicles, equipment, and machinery.',
            ],
            [
                'name' => 'Professional Fees',
                'description' => 'Payments made to external professionals and consultants for services rendered, such as legal fees, accounting fees, consulting fees, and auditing fees.',
            ],
            [
                'name' => 'Training & Development',
                'description' => 'Expenses associated with employee training programs, workshops, seminars, and professional development activities aimed at enhancing skills and knowledge.',
            ],
            [
                'name' => 'Software & Subscriptions',
                'description' => 'Costs incurred for purchasing software licenses, subscriptions to online services, cloud storage, and other digital tools essential for business operations.',
            ],
            [
                'name' => 'Office Rent',
                'description' => 'Payments made for renting office space, including lease payments, property taxes, maintenance fees, and other related expenses.',
            ],
            [
                'name' => 'Office Supplies',
                'description' => 'Expenditures for purchasing office supplies, including pens, paper, ink cartridges, toner, envelopes, and other essential office materials.',
            ],
            [
                'name' => 'Inventory Purchases',
                'description' => 'Costs associated with purchasing inventory or stock for resale, including raw materials, finished goods, and merchandise.',
            ],
            [
                'name' => 'Packaging & Shipping',
                'description' => 'Expenses related to packaging materials, shipping supplies, postage, courier services, and freight charges for delivering products to customers.',
            ],
            [
                'name' => 'Employee Benefits',
                'description' => 'Costs associated with providing employee benefits, such as health insurance, dental insurance, retirement contributions, and other fringe benefits.',
            ],
            [
                'name' => 'Legal Fees',
                'description' => 'Payments made to legal professionals for legal advice, contract drafting, litigation, intellectual property protection, and other legal services.',
            ],
            [
                'name' => 'Bank Charges',
                'description' => 'Fees charged by financial institutions for various banking services, including transaction fees, overdraft fees, wire transfer fees, and account maintenance fees.',
            ],
        ]);

        $expenseCategories->each(fn($expenseCategory) => ExpenseCategory::factory()->create($expenseCategory));
    }
}

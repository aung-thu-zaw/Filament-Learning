<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expenses = collect([
            // Rent Expenses
            [
                'expense_category_id' => 1,
                'amount' => 1500.00,
                'description' => 'Monthly rent payment for office space.',
                'expense_date' => '2024-04-01 09:00:00',
            ],

            [
                'expense_category_id' => 1,
                'amount' => 1500.00,
                'description' => 'Rent for the warehouse storage area.',
                'expense_date' => '2024-04-08 10:30:00',
            ],

            [
                'expense_category_id' => 1,
                'amount' => 1500.00,
                'description' => 'Rent payment for showroom space.',
                'expense_date' => '2024-04-15 11:45:00',
            ],

            [
                'expense_category_id' => 1,
                'amount' => 1500.00,
                'description' => 'Monthly rental payment for office equipment.',
                'expense_date' => '2024-04-22 14:20:00',
            ],

            [
                'expense_category_id' => 1,
                'amount' => 1500.00,
                'description' => 'Rent for temporary event space.',
                'expense_date' => '2024-04-29 16:55:00',
            ],

            // Utilities Expenses
            [
                'expense_category_id' => 2,
                'amount' => 250.00,
                'description' => 'Payment for electricity bill.',
                'expense_date' => '2024-04-05 13:30:00',
            ],

            [
                'expense_category_id' => 2,
                'amount' => 250.00,
                'description' => 'Water bill payment.',
                'expense_date' => '2024-04-12 09:45:00',
            ],

            [
                'expense_category_id' => 2,
                'amount' => 250.00,
                'description' => 'Gas bill payment.',
                'expense_date' => '2024-04-19 12:15:00',
            ],

            [
                'expense_category_id' => 2,
                'amount' => 250.00,
                'description' => 'Internet service provider bill payment.',
                'expense_date' => '2024-04-26 08:30:00',
            ],

            [
                'expense_category_id' => 2,
                'amount' => 250.00,
                'description' => 'Phone service bill payment.',
                'expense_date' => '2024-04-30 17:00:00',
            ],

            // Salaries & Wages Expenses
            [
                'expense_category_id' => 3,
                'amount' => 5000.00,
                'description' => 'Salary payment to employees for the month of April.',
                'expense_date' => '2024-04-10 11:45:00',
            ],

            [
                'expense_category_id' => 3,
                'amount' => 5000.00,
                'description' => 'Bonus payment to employees.',
                'expense_date' => '2024-04-17 14:00:00',
            ],

            [
                'expense_category_id' => 3,
                'amount' => 5000.00,
                'description' => 'Commission payment to sales team members.',
                'expense_date' => '2024-04-24 10:30:00',
            ],

            [
                'expense_category_id' => 3,
                'amount' => 5000.00,
                'description' => 'Payment for contract workers.',
                'expense_date' => '2024-04-27 09:15:00',
            ],

            [
                'expense_category_id' => 3,
                'amount' => 5000.00,
                'description' => 'Hourly wages for part-time employees.',
                'expense_date' => '2024-04-29 16:45:00',
            ],

            // Marketing & Advertising Expenses
            [
                'expense_category_id' => 4,
                'amount' => 2000.00,
                'description' => 'Cost of digital advertising campaign.',
                'expense_date' => '2024-04-03 08:30:00',
            ],

            [
                'expense_category_id' => 4,
                'amount' => 2000.00,
                'description' => 'Expenses for printing marketing materials.',
                'expense_date' => '2024-04-14 10:00:00',
            ],

            [
                'expense_category_id' => 4,
                'amount' => 2000.00,
                'description' => 'Cost of sponsoring a local event.',
                'expense_date' => '2024-04-21 12:45:00',
            ],

            [
                'expense_category_id' => 4,
                'amount' => 2000.00,
                'description' => 'Payment for influencer marketing campaign.',
                'expense_date' => '2024-04-26 14:20:00',
            ],

            [
                'expense_category_id' => 4,
                'amount' => 2000.00,
                'description' => 'Expenses for creating and distributing promotional videos.',
                'expense_date' => '2024-04-30 16:55:00',
            ],

            // Supplies & Stationery Expenses
            [
                'expense_category_id' => 5,
                'amount' => 300.00,
                'description' => 'Purchase of office supplies such as pens, paper, and envelopes.',
                'expense_date' => '2024-04-02 09:30:00',
            ],

            [
                'expense_category_id' => 5,
                'amount' => 300.00,
                'description' => 'Expenses for restocking printer cartridges and toner.',
                'expense_date' => '2024-04-09 11:00:00',
            ],

            [
                'expense_category_id' => 5,
                'amount' => 300.00,
                'description' => 'Purchase of stationery items for office use.',
                'expense_date' => '2024-04-17 13:45:00',
            ],

            [
                'expense_category_id' => 5,
                'amount' => 300.00,
                'description' => 'Cost of office furniture and fixtures.',
                'expense_date' => '2024-04-24 15:20:00',
            ],

            [
                'expense_category_id' => 5,
                'amount' => 300.00,
                'description' => 'Expenses for purchasing cleaning supplies.',
                'expense_date' => '2024-04-28 16:45:00',
            ],

            // Equipment Maintenance Expenses
            [
                'expense_category_id' => 6,
                'amount' => 400.00,
                'description' => 'Payment for routine maintenance of office computers.',
                'expense_date' => '2024-04-04 10:45:00',
            ],

            [
                'expense_category_id' => 6,
                'amount' => 400.00,
                'description' => 'Cost of repairing office printer.',
                'expense_date' => '2024-04-11 12:15:00',
            ],

            [
                'expense_category_id' => 6,
                'amount' => 400.00,
                'description' => 'Payment for servicing office air conditioning system.',
                'expense_date' => '2024-04-18 14:30:00',
            ],

            [
                'expense_category_id' => 6,
                'amount' => 400.00,
                'description' => 'Cost of repairing office photocopier.',
                'expense_date' => '2024-04-25 16:00:00',
            ],

            [
                'expense_category_id' => 6,
                'amount' => 400.00,
                'description' => 'Payment for maintenance of office HVAC system.',
                'expense_date' => '2024-04-29 17:30:00',
            ],

            // Travel & Transportation Expenses
            [
                'expense_category_id' => 7,
                'amount' => 800.00,
                'description' => 'Airfare for business trip to attend a conference.',
                'expense_date' => '2024-04-06 08:00:00',
            ],

            [
                'expense_category_id' => 7,
                'amount' => 800.00,
                'description' => 'Cost of hotel accommodation during business travel.',
                'expense_date' => '2024-04-13 12:00:00',
            ],

            [
                'expense_category_id' => 7,
                'amount' => 800.00,
                'description' => 'Expenses for rental car during business trip.',
                'expense_date' => '2024-04-20 16:00:00',
            ],

            [
                'expense_category_id' => 7,
                'amount' => 800.00,
                'description' => 'Taxi fare for transportation to client meeting.',
                'expense_date' => '2024-04-27 10:00:00',
            ],

            [
                'expense_category_id' => 7,
                'amount' => 800.00,
                'description' => 'Cost of train tickets for team offsite.',
                'expense_date' => '2024-04-30 14:30:00',
            ],

            // Insurance Expenses
            [
                'expense_category_id' => 8,
                'amount' => 1200.00,
                'description' => 'Payment for annual business insurance premium.',
                'expense_date' => '2024-04-05 11:30:00',
            ],

            [
                'expense_category_id' => 8,
                'amount' => 1200.00,
                'description' => 'Cost of liability insurance coverage.',
                'expense_date' => '2024-04-15 14:00:00',
            ],

            [
                'expense_category_id' => 8,
                'amount' => 1200.00,
                'description' => 'Payment for property insurance premium.',
                'expense_date' => '2024-04-20 16:45:00',
            ],

            [
                'expense_category_id' => 8,
                'amount' => 1200.00,
                'description' => 'Insurance premium for business vehicles.',
                'expense_date' => '2024-04-25 09:30:00',
            ],

            [
                'expense_category_id' => 8,
                'amount' => 1200.00,
                'description' => 'Payment for health insurance coverage for employees.',
                'expense_date' => '2024-04-29 12:15:00',
            ],

            // Taxes & Licenses Expenses
            [
                'expense_category_id' => 9,
                'amount' => 1500.00,
                'description' => 'Payment for business license renewal.',
                'expense_date' => '2024-04-03 10:00:00',
            ],

            [
                'expense_category_id' => 9,
                'amount' => 1500.00,
                'description' => 'Cost of annual tax filing.',
                'expense_date' => '2024-04-15 13:30:00',
            ],

            [
                'expense_category_id' => 9,
                'amount' => 1500.00,
                'description' => 'Payment for regulatory compliance fees.',
                'expense_date' => '2024-04-20 15:45:00',
            ],

            [
                'expense_category_id' => 9,
                'amount' => 1500.00,
                'description' => 'Tax payment to local authorities.',
                'expense_date' => '2024-04-27 11:30:00',
            ],

            [
                'expense_category_id' => 9,
                'amount' => 1500.00,
                'description' => 'Payment for business permits.',
                'expense_date' => '2024-04-30 14:00:00',
            ],

            // Repairs & Maintenance Expenses
            [
                'expense_category_id' => 10,
                'amount' => 600.00,
                'description' => 'Repair of office HVAC system.',
                'expense_date' => '2024-04-04 14:00:00',
            ],

            [
                'expense_category_id' => 10,
                'amount' => 600.00,
                'description' => 'Maintenance of office elevator.',
                'expense_date' => '2024-04-10 10:30:00',
            ],

            [
                'expense_category_id' => 10,
                'amount' => 600.00,
                'description' => 'Replacement of office furniture.',
                'expense_date' => '2024-04-17 15:45:00',
            ],

            [
                'expense_category_id' => 10,
                'amount' => 600.00,
                'description' => 'Repair of office plumbing system.',
                'expense_date' => '2024-04-22 11:30:00',
            ],

            [
                'expense_category_id' => 10,
                'amount' => 600.00,
                'description' => 'Maintenance of office security system.',
                'expense_date' => '2024-04-29 13:00:00',
            ],

            // Professional Fees Expenses
            [
                'expense_category_id' => 11,
                'amount' => 1800.00,
                'description' => 'Payment for legal consultation.',
                'expense_date' => '2024-04-02 09:45:00',
            ],

            [
                'expense_category_id' => 11,
                'amount' => 1800.00,
                'description' => 'Fee for accounting services.',
                'expense_date' => '2024-04-12 12:30:00',
            ],

            [
                'expense_category_id' => 11,
                'amount' => 1800.00,
                'description' => 'Payment for IT consulting services.',
                'expense_date' => '2024-04-18 14:15:00',
            ],

            [
                'expense_category_id' => 11,
                'amount' => 1800.00,
                'description' => 'Fee for graphic design services.',
                'expense_date' => '2024-04-25 10:45:00',
            ],

            [
                'expense_category_id' => 11,
                'amount' => 1800.00,
                'description' => 'Payment for consulting services.',
                'expense_date' => '2024-04-30 16:30:00',
            ],

            // Training & Development Expenses
            [
                'expense_category_id' => 12,
                'amount' => 900.00,
                'description' => 'Cost of attending industry conference.',
                'expense_date' => '2024-04-06 08:30:00',
            ],

            [
                'expense_category_id' => 12,
                'amount' => 900.00,
                'description' => 'Payment for online training courses.',
                'expense_date' => '2024-04-15 10:00:00',
            ],

            [
                'expense_category_id' => 12,
                'amount' => 900.00,
                'description' => 'Expenses for in-house training sessions.',
                'expense_date' => '2024-04-22 14:45:00',
            ],

            [
                'expense_category_id' => 12,
                'amount' => 900.00,
                'description' => 'Cost of attending leadership workshop.',
                'expense_date' => '2024-04-25 09:30:00',
            ],

            [
                'expense_category_id' => 12,
                'amount' => 900.00,
                'description' => 'Payment for employee certification exams.',
                'expense_date' => '2024-04-28 16:00:00',
            ],

            // Software & Subscriptions Expenses
            [
                'expense_category_id' => 13,
                'amount' => 700.00,
                'description' => 'Renewal of accounting software subscription.',
                'expense_date' => '2024-04-01 10:00:00',
            ],

            [
                'expense_category_id' => 13,
                'amount' => 700.00,
                'description' => 'Payment for CRM software license.',
                'expense_date' => '2024-04-10 12:30:00',
            ],

            [
                'expense_category_id' => 13,
                'amount' => 700.00,
                'description' => 'Subscription fee for email marketing software.',
                'expense_date' => '2024-04-15 14:45:00',
            ],

            [
                'expense_category_id' => 13,
                'amount' => 700.00,
                'description' => 'Cost of cloud storage subscription.',
                'expense_date' => '2024-04-20 11:30:00',
            ],

            [
                'expense_category_id' => 13,
                'amount' => 700.00,
                'description' => 'Payment for project management software.',
                'expense_date' => '2024-04-30 17:00:00',
            ],

            // Office Rent Expenses
            [
                'expense_category_id' => 14,
                'amount' => 1800.00,
                'description' => 'Monthly rent payment for office space.',
                'expense_date' => '2024-04-01 09:00:00',
            ],

            [
                'expense_category_id' => 14,
                'amount' => 1800.00,
                'description' => 'Lease payment for office equipment.',
                'expense_date' => '2024-04-10 11:30:00',
            ],

            [
                'expense_category_id' => 14,
                'amount' => 1800.00,
                'description' => 'Cost of office renovation project.',
                'expense_date' => '2024-04-20 13:45:00',
            ],

            [
                'expense_category_id' => 14,
                'amount' => 1800.00,
                'description' => 'Payment for office cleaning services.',
                'expense_date' => '2024-04-25 15:00:00',
            ],

            [
                'expense_category_id' => 14,
                'amount' => 1800.00,
                'description' => 'Rent for temporary office space.',
                'expense_date' => '2024-04-30 16:30:00',
            ],

            // Office Supplies Expenses
            [
                'expense_category_id' => 15,
                'amount' => 300.00,
                'description' => 'Purchase of office supplies such as pens, paper, and envelopes.',
                'expense_date' => '2024-04-02 09:30:00',
            ],

            [
                'expense_category_id' => 15,
                'amount' => 300.00,
                'description' => 'Expenses for restocking printer cartridges and toner.',
                'expense_date' => '2024-04-09 11:00:00',
            ],

            [
                'expense_category_id' => 15,
                'amount' => 300.00,
                'description' => 'Purchase of stationery items for office use.',
                'expense_date' => '2024-04-17 13:45:00',
            ],

            [
                'expense_category_id' => 15,
                'amount' => 300.00,
                'description' => 'Cost of office furniture and fixtures.',
                'expense_date' => '2024-04-24 15:20:00',
            ],

            [
                'expense_category_id' => 15,
                'amount' => 300.00,
                'description' => 'Expenses for purchasing cleaning supplies.',
                'expense_date' => '2024-04-28 16:45:00',
            ],

            // Legal Fees Expenses
            [
                'expense_category_id' => 19,
                'amount' => 1000.00,
                'description' => 'Payment for legal consultation.',
                'expense_date' => '2024-04-02 09:45:00',
            ],

            [
                'expense_category_id' => 19,
                'amount' => 1000.00,
                'description' => 'Legal fees for drafting contracts.',
                'expense_date' => '2024-04-12 12:30:00',
            ],

            [
                'expense_category_id' => 19,
                'amount' => 1000.00,
                'description' => 'Payment for trademark registration.',
                'expense_date' => '2024-04-18 14:15:00',
            ],

            [
                'expense_category_id' => 19,
                'amount' => 1000.00,
                'description' => 'Fees for resolving legal disputes.',
                'expense_date' => '2024-04-25 10:45:00',
            ],

            [
                'expense_category_id' => 19,
                'amount' => 1000.00,
                'description' => 'Cost of hiring legal representation.',
                'expense_date' => '2024-04-30 16:30:00',
            ],

        ]);

        $expenses = $expenses->shuffle();

        $expenses->each(fn ($expense) => Expense::factory()->create($expense));

    }
}

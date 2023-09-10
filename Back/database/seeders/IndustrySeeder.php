<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
            'Major Pharmaceuticals',
            'Investment Managers',
            'Aerospace',
            'Business Services',
            'Major Pharmaceuticals',
            'Savings Institutions',
            'Major Pharmaceuticals',
            'Major Banks',
            'Industrial Machinery/Components',
            'Computer Software: Programming, Data Processing',
            'Auto Parts:O.E.M.',
            'Diversified Commercial Services',
            'Consumer Specialties',
            'EDP Services',
            'Medical Specialities',
            'Telecommunications Equipment',
            'Major Pharmaceuticals',
            'Services-Misc. Amusement & Recreation',
            'Real Estate Investment Trusts',
            'Real Estate Investment Trusts',
            'Major Pharmaceuticals',
            'Major Banks',
            'Commercial Banks',
            'Biotechnology: Biological Products (No Diagnostic Substances)',
            'Steel/Iron Ore',
            'Other Pharmaceuticals',
            'Semiconductors',
            'Electrical Products',
            'Computer Software: Prepackaged Software',
            'Business Services',
            'Other Consumer Services',
            'Finance: Consumer Services',
            'Motor Vehicles',
            'Medical/Dental Instruments',
            'Major Banks',
            'Packaged Foods',
            'Real Estate Investment Trusts',
            'Major Pharmaceuticals',
            'Natural Gas Distribution',
            'Retail: Computer Software & Peripheral Equipment',
            'Hotels/Resorts',
            'Real Estate Investment Trusts',
            'Investment Bankers/Brokers/Service',
            'Oil Refining/Marketing',
            'Electrical Products',
            'Major Pharmaceuticals',
            'Real Estate Investment Trusts',
            'Major Pharmaceuticals',
            'Electric Utilities: Central',
            'Telecommunications Equipment',
            'Real Estate Investment Trusts',
            'Power Generation',
            'Trucking Freight/Courier Services',
            'Business Services',
            'Farming/Seeds/Milling',
            'Investment Bankers/Brokers/Service',
            'Major Chemicals',
            'Major Chemicals',
            'Biotechnology: Biological Products (No Diagnostic Substances)',
            'Beverages (Production/Distribution)',
            'Coal Mining',
            'Other Consumer Services',
            'Forest Products',
            'Major Pharmaceuticals',
            'Computer Software: Programming, Data Processing',
            'Metal Fabrications',
            'Computer Manufacturing',
            'Major Pharmaceuticals',
            'Telecommunications Equipment',
            'Computer Software: Prepackaged Software',
            'Major Banks',
            'Military/Government/Technical',
            'EDP Services',
            'Real Estate',
            'Industrial Machinery/Components',
            'Apparel',
        ];


        foreach ($industries as $industry) {
            DB::table('industries')->insert([
                'name' => $industry,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

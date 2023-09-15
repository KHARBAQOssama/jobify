<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizeRanges = [
            '0 - 100',
            '100 - 500',
            '500 - 1000',
            '1000 - 2000',
            '2000 - 5000',
            '5000 - 10000',
            '10000 - and above',
        ];

        // Loop through the size ranges and insert them into the 'company_sizes' table
        foreach ($sizeRanges as $sizeRange) {
            DB::table('company_sizes')->insert([
                'value' => $sizeRange,
            ]);
        }
    }
}

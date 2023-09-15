<?php

namespace Database\Seeders;

use App\Models\EmploymentType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Full-Time',
            'Part-Time',
            'Remote',
            'Internship',
            'Contract'
        ];

        foreach ($types as $type) {
            DB::table('employment_types')->insert(["name"=>$type]);
        }
    }
}

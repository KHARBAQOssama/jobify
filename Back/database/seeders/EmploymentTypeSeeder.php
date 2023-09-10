<?php

namespace Database\Seeders;

use App\Models\EmploymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmploymentType::create(['name' => 'Full Time']);
        EmploymentType::create(['name' => 'Part Time']);
        EmploymentType::create(['name' => 'Freelance']);
        EmploymentType::create(['name' => 'Contractual']);
    }
}

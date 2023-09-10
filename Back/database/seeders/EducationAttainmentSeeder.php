<?php

namespace Database\Seeders;

use App\Models\EducationAttainment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationAttainmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EducationAttainment::create(['name'=>"Less Than High School"]);
        EducationAttainment::create(['name'=>"High School"]);
        EducationAttainment::create(['name'=>"Associate's Degree"]);
        EducationAttainment::create(['name'=>"Bachelor's Degree"]);
        EducationAttainment::create(['name'=>"Master's Degree"]);
        EducationAttainment::create(['name'=>"Doctoral or Professional Degree"]);
    }
}

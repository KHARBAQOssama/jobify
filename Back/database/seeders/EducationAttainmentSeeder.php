<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\EducationAttainment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationAttainmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $education_attainments = [
            "Less Than High School",
            "High School",
            "Associate's Degree",
            "Bachelor's Degree",
            "Master's Degree",
            "Doctoral or Professional Degree",];

        foreach ($education_attainments as $attainment) {
            DB::table('education_attainments')->insert(['name'=>$attainment]);
        }
    }
}

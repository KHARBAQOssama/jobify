<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $companies = \App\Models\Company::all();
        $jobLevels = \App\Models\JobLevel::all();
        $jobCategories = \App\Models\JobCategory::all();
        $workTypes = \App\Models\WorkType::all();
        $employmentTypes = \App\Models\EmploymentType::all();
        $educationAttainments = \App\Models\EducationAttainment::all();

        foreach ($companies as $company) {
            for ($i = 1; $i <= 5; $i++) { 
                DB::table('jobs')->insert([
                    'title' => $faker->jobTitle,
                    'company_id' => $company->id,
                    'description' => $faker->paragraph,
                    'qualifications' => json_encode([$faker->text, $faker->text]),
                    'benefits' => json_encode([$faker->text, $faker->text]),
                    'ends_in' => $faker->date,
                    'minimum_salary' => $faker->numberBetween(30000, 80000),
                    'maximum_salary' => $faker->numberBetween(80000, 150000),
                    'frequency' => $faker->randomElement(['Monthly', 'Annually']),
                    'currency' => $faker->currencyCode,
                    'minimum_years_experience' => $faker->numberBetween(0, 10),
                    'job_level_id' => $jobLevels->random()->id,
                    'job_category_id' => $jobCategories->random()->id,
                    'work_type_id' => $workTypes->random()->id,
                    'employment_type_id' => $employmentTypes->random()->id,
                    'education_attainment_id' => $educationAttainments->random()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

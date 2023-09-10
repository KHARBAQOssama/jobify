<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(EducationAttainmentSeeder::class);
        $this->call(EmploymentTypeSeeder::class);
        $this->call(WorkTypeSeeder::class);
        $this->call(JobLevelSeeder::class);
        $this->call(JobCategorySeeder::class);
        $this->call(IndustrySeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JobSeeder::class);

    }
}

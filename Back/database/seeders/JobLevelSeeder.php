<?php

namespace Database\Seeders;

use App\Models\JobLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobLevel::create(['name' => 'Internship / OJT']);
        JobLevel::create(['name' => 'Entry Level / Junior, Apprentice']);
        JobLevel::create(['name' => 'Associate / Supervisor']);
        JobLevel::create(['name' => 'Mid-Senior Level / Manger']);
        JobLevel::create(['name' => 'Director / Executive']);
    }
}

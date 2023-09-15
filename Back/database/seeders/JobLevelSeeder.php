<?php

namespace Database\Seeders;

use App\Models\JobLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            'Entry Level',
            'Mid Level',
            'Senior Level',
            'Director',
            'VP or Above'
        ];

        foreach ($levels as $level) {
            DB::table('job_levels')->insert([
                'name' => $level,
            ]);
        }
    }
}

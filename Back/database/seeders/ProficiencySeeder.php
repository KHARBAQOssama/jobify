<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProficiencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languageProficiencyLevels = [
            'Elementary Proficiency (Basic)',
            'Limited Working Proficiency (Low Intermediate)',
            'Professional Working Proficiency (Intermediate)',
            'Full Professional Proficiency (High Intermediate)',
            'Native or Bilingual Proficiency (Fluent)',
            'Expert Proficiency (Near-Native or Mastery)',
            'Basic Proficiency (for casual learners)'
        ];
        foreach ($languageProficiencyLevels as $proficiency) {
            DB::table('proficiencies')
                ->insert([
                'name'=>$proficiency
            ]);
        }
    }
}

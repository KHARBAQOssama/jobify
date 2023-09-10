<?php

namespace Database\Seeders;

use App\Models\WorkType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkType::create(['name' => 'Onsite','explanation' => 'Work from Office']);
        WorkType::create(['name' => 'Remote','explanation' => 'Work from Home']);
    }
}

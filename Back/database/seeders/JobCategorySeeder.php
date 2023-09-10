<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       JobCategory::create(['name'=>'Accounting and Finance']);
       JobCategory::create(['name'=>'Administration and Coordination']);
       JobCategory::create(['name'=>'Architecture and Engineering']);
       JobCategory::create(['name'=>'Arts and Sports']);
       JobCategory::create(['name'=>'Customer Service']);
       JobCategory::create(['name'=>'Education and Training']);
       JobCategory::create(['name'=>'General Services']);
       JobCategory::create(['name'=>'Health and Medical']);
       JobCategory::create(['name'=>'Hospitality and Tourism']);
       JobCategory::create(['name'=>'Human Resources']);
       JobCategory::create(['name'=>'IT and Software']);
       JobCategory::create(['name'=>'Legal']);
       JobCategory::create(['name'=>'Management and Consultancy']);
       JobCategory::create(['name'=>'Manufacturing and Production']);
       JobCategory::create(['name'=>'Media and  Creatives']);
       JobCategory::create(['name'=>'Public Service and NGOs']);
       JobCategory::create(['name'=>'Safety and Security']);
       JobCategory::create(['name'=>'Sales and Marketing']);
       JobCategory::create(['name'=>'Sciences']);
       JobCategory::create(['name'=>'Supply Chain']);
       JobCategory::create(['name'=>'Writing and Content']);
    }
}

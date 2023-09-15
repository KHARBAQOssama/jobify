<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ 
            'Information Technology (IT)',
            'Healthcare',
            'Education',
            'Finance',
            'Marketing',
            'Engineering',
            'Sales',
            'Customer Service',
            'Human Resources',
            'Retail',
            'Construction',
            'Hospitality',
            'Manufacturing',
            'Legal',
            'Art and Design',
            'Social Services',
            'Transportation',
            'Science',
            'Entertainment',
            'Agriculture',
            'Government',
            'Media and Communication',
            'Nonprofit and Volunteering',
            'Sports and Recreation',
            'Real Estate',
            'Environmental and Sustainability',
            'Food Service',
            'Fashion',
            'Energy and Utilities',
            'Automotive'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert(["name" => $category]);
        }
    }
}

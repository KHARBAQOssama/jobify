<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('companies')->insert([
                'name' => $faker->company,
                'email' => $faker->unique()->safeEmail,
                'birthday' => $faker->date,
                'description' => $faker->paragraph,
                'industry_id' => $faker->numberBetween(1, 50), 
                'size' => $faker->randomElement(['Small', 'Medium', 'Large']),
                'location' => $faker->address,
                'website' => $faker->url,
                'contact_phone' => $faker->phoneNumber,
                'contact_email' => $faker->unique()->safeEmail,
                'image' => $faker->imageUrl(),
                'revenue' => $faker->randomFloat(2, 10000, 1000000),
                'mission' => $faker->sentence,
                'vision' => $faker->sentence,
                'social_media_facebook' => $faker->url,
                'social_media_twitter' => $faker->url,
                'social_media_linkedin' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

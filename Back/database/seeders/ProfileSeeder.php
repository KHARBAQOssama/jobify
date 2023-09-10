<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ProfileSeeder extends Seeder
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
            DB::table('profiles')->insert([
                'name' => $faker->name,
                'nickname' => $faker->userName,
                'birthday' => $faker->date,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone_number' => $faker->phoneNumber,
                'location' => $faker->address,
                'occupation' => $faker->jobTitle,
                'summary' => $faker->text,
                'image' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

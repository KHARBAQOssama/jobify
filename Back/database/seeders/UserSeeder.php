<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 40; $i++) {
            DB::table('users')->insert([
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password' . $i),
                'role_id' => $faker->numberBetween(1, 3), 
                'profile_id' => $faker->numberBetween(1, 20), 
            ]);
            DB::table('users')->insert([
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password' . $i),
                'role_id' => $faker->numberBetween(1, 3), 
                'company_id' => $faker->numberBetween(1, 20), 
            ]);
        }
    }
}

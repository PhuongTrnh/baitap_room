<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class RoomSeeder extends Seeder
{
    
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('rooms')->insert([
                'number' => $faker->unique()->randomNumber(3),
                'type' => $faker->randomElement(['standard', 'deluxe', 'suite']),
                'availability' => $faker->randomElement(['available', 'occupied', 'under maintenance']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
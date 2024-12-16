<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->company . '-PC' . $faker->numberBetween(1, 99),
                'model' => $faker->company . ' ' . $faker->numberBetween(1, 9999),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'macOS', 'Windows 11']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-9700', 'AMD Ryzen 5 3600']),
                'memory' => $faker->randomElement([4, 8, 16, 32, 64,128,256,512]),
                'available' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

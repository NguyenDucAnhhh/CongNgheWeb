<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement(DB::table('medicines')->pluck('medicine_id')),
                'quantity' => $faker->numberBetween(1, 10),
                'sale_date' => $faker->dateTime(),
                'customer_phone' => $faker->numerify('##########'),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computersId = DB::table('computers')->pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computersId),
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTime,
                'description' => $faker->paragraph,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

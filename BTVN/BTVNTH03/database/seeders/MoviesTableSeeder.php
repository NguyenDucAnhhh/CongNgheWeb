<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $cinema_id = DB::table('cinemas')->pluck('id');
        for($i = 0; $i <10 ; $i++){
            DB::table('movies')->insert([
                'title'=>$faker->sentence,
                'director'=>$faker->name,
                'release_date'=>$faker->date,
                'duration'=>$faker->numberBetween(1,500),
                'cinema_id'=>$faker->randomElement($cinema_id),
            ]);
        }
    }
}

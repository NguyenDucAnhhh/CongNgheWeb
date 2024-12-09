<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $library_id = DB::table('libraries')->pluck('id');
        for($i = 0; $i <10 ; $i++){
            DB::table('books')->insert([
                'title'=>$faker->word,
                'author'=>$faker->name,
                'publication_year'=>$faker->year,
                'genre'=>$faker->word,
                'library_id'=>$faker->randomElement($library_id)
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class HardwareDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $center_id = DB::table('it_centers')->pluck('id');
        for($i = 0; $i <10 ; $i++){
            DB::table('hardware_devices')->insert([
                'device_name'=>$faker->company,
                'type'=>$faker->randomElement(['Mouse','Keyboard','Headset']),
                'status'=>$faker->boolean,
                'center_id'=>$faker->randomElement($center_id),
            ]);
        }
    }
}

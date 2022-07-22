<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->delete();

        DB::table('manufacturers')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Dell',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            1 =>
                array (
                    'id' => 2,
                    'name' => 'Asus',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Samsung',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            3 =>
                array (
                    'id' => 4,
                    'name' => 'Sony',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'HKC',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            5 =>
                array (
                    'id' => 6,
                    'name' => 'Polycom',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            6 =>
                array (
                    'id' => 7,
                    'name' => 'Cisco',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'TPLink',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            8 =>
                array (
                    'id' => 9,
                    'name' => 'AOC',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => 'Fuhlen',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            10 =>
                array (
                    'id' => 11,
                    'name' => 'HP',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => 'GrandStream',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => 'Panasonic',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => 'Nokia',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            14 =>
                array (
                    'id' => 15,
                    'name' => 'Epson',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            15 =>
                array (
                    'id' => 16,
                    'name' => 'SonicView',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            17 =>
                array (
                    'id' => 18,
                    'name' => 'Optoma',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            18 =>
                array (
                    'id' => 19,
                    'name' => 'Brother',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            19 =>
                array (
                    'id' => 20,
                    'name' => 'China',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
        ));
    }
}

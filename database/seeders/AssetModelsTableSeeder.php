<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_models')->delete();

        DB::table('asset_models')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Vostro 14 5468',
                    'manufacturer_id' => 1,
                    'category_id' => 1,
                    'model_no' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => '340 G8',
                    'manufacturer_id' => 11,
                    'category_id' => 1,
                    'model_no' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => '309B',
                    'manufacturer_id' => 10,
                    'category_id' => 10,
                    'model_no' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Inspiron 5755',
                    'manufacturer_id' => 1,
                    'category_id' => 1,
                    'model_no' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
        ));
    }
}

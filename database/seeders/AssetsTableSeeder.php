<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assets')->delete();

        DB::table('assets')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'tag' => 'LAPTOP-1',
                    'serial' => '3Z77G72',
                    'model_id' => 1,
                    'status' => 'Đã cấp phát',
                    'area_id' => 1,
                    'purchasing_date' => '2019-05-11',
                    'warranty' => 18,
                    'supplier_id' => 3,
                    'purchase_cost' => 22000000,
                    'employee_id' => 4,
                    'note' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            1 =>
                array (
                    'id' => 2,
                    'tag' => 'LAPTOP-2',
                    'serial' => 'XZ860UQ',
                    'model_id' => 2,
                    'status' => 'Đã cấp phát',
                    'area_id' => 8,
                    'purchasing_date' => '2021-09-10',
                    'warranty' => 18,
                    'supplier_id' => 2,
                    'purchase_cost' => 18000000,
                    'employee_id' => 2,
                    'note' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            2 =>
                array (
                    'id' => 3,
                    'tag' => 'PHUKIEN-3',
                    'serial' => null,
                    'model_id' => 3,
                    'status' => 'Đã cấp phát',
                    'area_id' => 2,
                    'purchasing_date' => '2020-05-11',
                    'warranty' => 18,
                    'supplier_id' => 2,
                    'purchase_cost' => 250000,
                    'employee_id' => 4,
                    'note' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            3 =>
                array (
                    'id' => 4,
                    'tag' => 'LAPTOP-4',
                    'serial' => '99URTZ1',
                    'model_id' => 2,
                    'status' => 'Đã cấp phát',
                    'area_id' => 1,
                    'purchasing_date' => '2022-08-12',
                    'warranty' => 18,
                    'supplier_id' => 3,
                    'purchase_cost' => 20000000,
                    'employee_id' => 2,
                    'note' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
        ));
    }
}

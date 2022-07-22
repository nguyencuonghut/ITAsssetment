<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();

        DB::table('departments')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Kiểm Soát Nội Bộ',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            1 =>
                array (
                    'id' => 2,
                    'name' => 'Trại',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Kế Toán',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            3 =>
                array (
                    'id' => 4,
                    'name' => 'Dự Án',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Hành Chính',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            5 =>
                array (
                    'id' => 6,
                    'name' => 'Kinh doanh',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            6 =>
                array (
                    'id' => 7,
                    'name' => 'Bảo vệ',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'Kho',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            8 =>
                array (
                    'id' => 9,
                    'name' => 'Sản Xuất',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => 'Marketing',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            10 =>
                array (
                    'id' => 11,
                    'name' => 'Kỹ Thuật',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => 'Thu Mua',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => 'Quản Lý Chất Lượng',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => 'Bảo Trì',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
        ));
    }
}

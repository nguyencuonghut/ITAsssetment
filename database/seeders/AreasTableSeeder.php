<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->delete();

        DB::table('areas')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Phòng Kiểm Soát Nội Bộ',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            1 =>
                array (
                    'id' => 2,
                    'name' => 'Phòng Trại',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Phòng Kế Toán',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Phòng Bán Hàng',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Phòng Hành Chính',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            5 =>
                array (
                    'id' => 6,
                    'name' => 'Phòng Sale Admin',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            6 =>
                array (
                    'id' => 7,
                    'name' => 'Phòng Bảo vệ khu A',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'Phòng Bảo Vệ Khu B',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            8 =>
                array (
                    'id' => 9,
                    'name' => 'Phòng Dự Án',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => 'Phòng họp Kinh Doanh',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            10 =>
                array (
                    'id' => 11,
                    'name' => 'Phòng họp 1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => 'Phòng Cân 80T',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => 'Phòng cân 5T GSGC',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => 'Phòng cân 5T Thủy Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            14 =>
                array (
                    'id' => 15,
                    'name' => 'Phòng kho cửa xuất',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            15 =>
                array (
                    'id' => 16,
                    'name' => 'Phòng Mixer FM1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            16 =>
                array (
                    'id' => 17,
                    'name' => 'Phòng Mixer FM2',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            17 =>
                array (
                    'id' => 18,
                    'name' => 'Phòng Mixer FM3',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            19 =>
                array (
                    'id' => 20,
                    'name' => 'Lò hơi',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            20 =>
                array (
                    'id' => 21,
                    'name' => 'Phòng Bảo Trì',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            21 =>
                array (
                    'id' => 22,
                    'name' => 'Kho Cơ Khí',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            23 =>
                array (
                    'id' => 24,
                    'name' => 'Khu trộn Mix',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            25 =>
                array (
                    'id' => 26,
                    'name' => 'Kho DE',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            27 =>
                array (
                    'id' => 28,
                    'name' => 'Kho thuốc',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            28 =>
                array (
                    'id' => 29,
                    'name' => 'Phòng Thu Mua',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            29 =>
                array (
                    'id' => 30,
                    'name' => 'Phòng cân 100T',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            31 =>
                array (
                    'id' => 32,
                    'name' => 'Phòng KCS nguyên liệu (Gầm cầu thang khu B)',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            32 =>
                array (
                    'id' => 33,
                    'name' => 'Phòng Kỹ Thuật',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            33 =>
                array (
                    'id' => 34,
                    'name' => 'Phòng Thí Nghiệm',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            34 =>
                array (
                    'id' => 35,
                    'name' => 'Kho GHZ',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            35 =>
                array (
                    'id' => 36,
                    'name' => 'Kho IT',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
        ));
    }
}

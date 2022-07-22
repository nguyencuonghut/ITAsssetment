<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Laptop',
                    'type' => 'Tài Sản',
                    'code' => 'LAPTOP',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Case',
                    'code' => 'CASE',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Màn hình',
                    'code' => 'MONITOR',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            3 =>
                array (
                    'id' => 4,
                    'name' => 'Điện thoại bàn',
                    'code' => 'PHONE',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Điện thoại di động',
                    'code' => 'MOBILE',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Máy tính bảng',
                    'code' => 'TABLET',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'Hệ thống Polycom',
                    'code' => 'POLYCOM',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'Máy chiếu',
                    'code' => 'PROJECTOR',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            8 =>
                array (
                    'id' => 9,
                    'name' => 'Bàn phím có dây',
                    'code' => 'PHUKIEN',
                    'type' => 'Phụ Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => 'Chuột không dây',
                    'code' => 'PHUKIEN',
                    'type' => 'Phụ Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            10 =>
                array (
                    'id' => 11,
                    'name' => 'Chuột có dây',
                    'code' => 'PHUKIEN',
                    'type' => 'Phụ Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => 'Bàn phím không dây',
                    'code' => 'PHUKIEN',
                    'type' => 'Phụ Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => 'Bàn phím laptop',
                    'code' => 'LINHKIEN',
                    'type' => 'Linh kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => 'Ram',
                    'code' => 'LINHKIEN',
                    'type' => 'Linh Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            14 =>
                array (
                    'id' => 15,
                    'name' => 'Ổ cứng HDD',
                    'code' => 'LINHKIEN',
                    'type' => 'Linh Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            15 =>
                array (
                    'id' => 16,
                    'name' => 'Ổ cứng SSD',
                    'code' => 'LINHKIEN',
                    'type' => 'Linh Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            16 =>
                array (
                    'id' => 17,
                    'name' => 'Nguồn',
                    'code' => 'LINHKIEN',
                    'type' => 'Linh Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            17 =>
                array (
                    'id' => 18,
                    'name' => 'Main',
                    'code' => 'LINHKIEN',
                    'type' => 'Linh Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            18 =>
                array (
                    'id' => 19,
                    'name' => 'Bộ lưu điện',
                    'code' => 'UPS',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            19 =>
                array (
                    'id' => 20,
                    'name' => 'Máy backup dữ liệu NAS',
                    'code' => 'NAS',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            20 =>
                array (
                    'id' => 21,
                    'name' => 'Switch POE',
                    'code' => 'POESWITCH',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            21 =>
                array (
                    'id' => 22,
                    'name' => 'Switch thông minh (chia VLAN)',
                    'code' => 'SMARTSWITCH',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            22 =>
                array (
                    'id' => 23,
                    'name' => 'Bộ phát wifi',
                    'code' => 'WIFI',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            23 =>
                array (
                    'id' => 24,
                    'name' => 'Loa',
                    'code' => 'SPEAKER',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            24 =>
                array (
                    'id' => 25,
                    'name' => 'Mic',
                    'code' => 'MIC',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            25 =>
                array (
                    'id' => 26,
                    'name' => 'Headphone',
                    'code' => 'HEADPHONE',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            26 =>
                array (
                    'id' => 27,
                    'name' => 'Màn chiếu',
                    'code' => 'PROJECTORSCREEN',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            27 =>
                array (
                    'id' => 28,
                    'name' => 'Card mạng rời',
                    'code' => 'LINHKIEN',
                    'type' => 'Linh Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            28 =>
                array (
                    'id' => 29,
                    'name' => 'Pin laptop',
                    'code' => 'LINHKIEN',
                    'type' => 'Linh Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            29 =>
                array (
                    'id' => 30,
                    'name' => 'Sạc laptop',
                    'code' => 'PHUKIEN',
                    'type' => 'Phụ Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            30 =>
                array (
                    'id' => 31,
                    'name' => 'Dây HDMI',
                    'code' => 'PHUKIEN',
                    'type' => 'Phụ Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            31 =>
                array (
                    'id' => 32,
                    'name' => 'Dây VGA',
                    'code' => 'PHUKIEN',
                    'type' => 'Phụ Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            32 =>
                array (
                    'id' => 33,
                    'name' => 'Dây chuyển đổi USB to COM',
                    'code' => 'LINHKIEN',
                    'type' => 'Linh Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            33 =>
                array (
                    'id' => 34,
                    'name' => 'Card PCI ra COM',
                    'code' => 'LINHKIEN',
                    'type' => 'Linh Kiện',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            34 =>
                array (
                    'id' => 35,
                    'name' => 'Bản quyền Windows Server',
                    'code' => 'LICENSE',
                    'type' => 'Bản Quyền',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            35 =>
                array (
                    'id' => 36,
                    'name' => 'Bản quyền Windows',
                    'code' => 'LICENSE',
                    'type' => 'Bản Quyền',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            36 =>
                array (
                    'id' => 37,
                    'name' => 'Bản quyền Office',
                    'code' => 'LICENSE',
                    'type' => 'Bản Quyền',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            37 =>
                array (
                    'id' => 38,
                    'name' => 'Máy in',
                    'code' => 'PRINTER',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            38 =>
                array (
                    'id' => 39,
                    'name' => 'Máy Fax',
                    'code' => 'FAX',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            39 =>
                array (
                    'id' => 40,
                    'name' => 'Máy Scan',
                    'code' => 'SCANNER',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            40 =>
                array (
                    'id' => 41,
                    'name' => 'Switch thường',
                    'code' => 'NORMALSWITCH',
                    'type' => 'Tài Sản',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
        ));
    }
}

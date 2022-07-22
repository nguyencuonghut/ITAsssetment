<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->delete();

        DB::table('suppliers')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Công ty TNHH công nghệ số Đạt Dương',
                    'address' => '313 Nguyễn Hữu Tiến - TT Đồng Văn - Duy Tiên - Hà Nam',
                    'mobile' => '0915037358',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Công ty công nghệ WinB',
                    'address' => 'Số 146 Nguyễn Hữu Tiến - Đồng Văn - Duy Tiên - Hà Nam',
                    'mobile' => '0326633000',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Không rõ',
                    'address' => 'Không rõ',
                    'mobile' => '0000000000',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
        ));
    }
}

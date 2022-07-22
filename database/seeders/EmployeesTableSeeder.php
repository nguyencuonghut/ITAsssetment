<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->delete();

        DB::table('employees')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'IT',
                    'email' => 'it@honghafeed.com.vn',
                    'department_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Phạm Hồng Hải',
                    'email' => 'phamhonghai@honghafeed.com.vn',
                    'department_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Phạm Thị Trang',
                    'email' => 'phamthitrang@honghafeed.com.vn',
                    'department_id' => 6,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Nguyễn Văn Cường',
                    'email' => 'nguyenvancuong@honghafeed.com.vn',
                    'department_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
        ));
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('old_employee_id')->unsigned();
            $table->foreign('old_employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->bigInteger('new_employee_id')->unsigned();
            $table->foreign('new_employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->bigInteger('asset_id')->unsigned();
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
            $table->enum('status', ['Đã cấp phát', 'Sẵn sàng cấp phát', 'Đã thu hồi', 'Hỏng - Không sửa được', 'Hỏng - Mang đi sửa', 'Đã thất lạc'])->default('Sẵn sàng cấp phát');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('activity_logs');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};

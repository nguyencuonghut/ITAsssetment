<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->unique()->default('-');
            $table->string('serial')->nullable();
            $table->foreign('model_id')->references('id')->on('asset_models')->onDelete('cascade');
            $table->bigInteger('model_id')->unsigned();
            $table->enum('status', ['Đã cấp phát', 'Sẵn sàng cấp phát', 'Đã thu hồi', 'Hỏng - Không sửa được', 'Hỏng - Mang đi sửa', 'Đã thất lạc'])->default('Sẵn sàng cấp phát');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->bigInteger('area_id')->unsigned();
            $table->date('purchasing_date')->nullable();
            $table->integer('warranty')->default(12);//months
            $table->bigInteger('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->bigInteger('purchase_cost')->unsigned()->nullable();
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('assets');
    }
};

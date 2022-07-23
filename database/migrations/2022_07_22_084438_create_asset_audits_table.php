<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAssetAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_audits', function (Blueprint $table) {
            $table->id();
            $table->dateTime('request_time');
            $table->dateTime('confirmation_time')->nullable();
            $table->bigInteger('asset_id')->unsigned();
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->enum('result', ['Đúng', 'Sai'])->nullable();
            $table->string('token')->nullable();
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
        Schema::dropIfExists('asset_audits');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

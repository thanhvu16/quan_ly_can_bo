<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuaTrinhChucVu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_chuc_vu', function (Blueprint $table) {
            $table->id();
            $table->integer('users')->nullable();
            $table->date('thoi_gian')->nullable();
            $table->string('cong_viec')->nullable();
            $table->string('phu_cap')->nullable();
            $table->string('co_quan')->nullable();
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
        Schema::dropIfExists('qua_trinh_chuc_vu');
    }
}

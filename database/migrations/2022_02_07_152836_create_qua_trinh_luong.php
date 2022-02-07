<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuaTrinhLuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_luong', function (Blueprint $table) {
            $table->id();
            $table->integer('users')->nullable();
            $table->date('tu_ngay')->nullable();
            $table->date('den_ngay')->nullable();
            $table->string('ngach_cong_chuc')->nullable();
            $table->string('bac')->nullable();
            $table->string('he_so')->nullable();
            $table->string('phu_cap')->nullable();
            $table->string('phan_tram')->nullable();
            $table->string('tong_luong')->nullable();
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
        Schema::dropIfExists('qua_trinh_luong');
    }
}

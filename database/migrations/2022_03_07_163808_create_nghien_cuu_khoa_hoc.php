<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNghienCuuKhoaHoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_nghien_cuu_khoa_hoc', function (Blueprint $table) {
            $table->id();
            $table->date('thoi_gian')->nullable();
            $table->integer('users')->nullable();
            $table->string('ten_de_tai')->nullable();
            $table->string('cap_de_tai')->nullable();
            $table->string('chu_nhiem')->nullable();
            $table->string('tu_cach_tham_gia')->nullable();
            $table->string('ket_qua')->nullable();
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
        Schema::dropIfExists('qua_trinh_nghien_cuu_khoa_hoc');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiaDinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_gia_dinh', function (Blueprint $table) {
            $table->id();
            $table->integer('users')->nullable();
            $table->string('quan_he')->nullable();
            $table->string('ho_ten')->nullable();
            $table->string('nam_sinh')->nullable();
            $table->string('nghe_nghiep')->nullable();
            $table->string('noi_lam_viec')->nullable();
            $table->string('noi_o')->nullable();
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
        Schema::dropIfExists('qua_trinh_gia_dinh');
    }
}

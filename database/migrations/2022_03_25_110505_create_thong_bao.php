<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongBao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_bao', function (Blueprint $table) {
            $table->id();
            $table->integer('nguoi_gui')->nullable();
            $table->integer('nguoi_nhan')->nullable();
            $table->text('noi_dung')->nullable();
            $table->integer('id_ho_so')->nullable();
            $table->tinyInteger('trang_thai')->nullable();
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
        Schema::dropIfExists('thong_bao');
    }
}

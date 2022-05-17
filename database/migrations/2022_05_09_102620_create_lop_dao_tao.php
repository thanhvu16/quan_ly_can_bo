<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopDaoTao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qldt_lop_dao_tao', function (Blueprint $table) {
            $table->id();
            $table->string('ten')->nullable();
            $table->string('don_vi_mo')->nullable();
            $table->integer('so_luong')->nullable();
            $table->date('ngay_khai_giang')->nullable();
            $table->date('ngay_be_giang')->nullable();
            $table->string('noi_dung_dt')->nullable();
            $table->tinyInteger('trang_thai')->default(1);
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
        Schema::dropIfExists('qldt_lop_dao_tao');
    }
}

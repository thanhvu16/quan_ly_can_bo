<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhSachHuyHieuDang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_sach_huy_hieu_dang', function (Blueprint $table) {
            $table->id();
            $table->integer('can_bo_id')->nullable();
            $table->integer('dot_cap_the_id')->nullable();
            $table->string('ma_huy_hieu')->nullable();
            $table->string('loai_huy_hieu')->nullable();
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
        Schema::dropIfExists('danh_sach_huy_hieu_dang');
    }
}

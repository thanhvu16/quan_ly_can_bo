<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdđColumeKhenThuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->string('khen_thuong_cao_nhat')->nullable();
            $table->string('ky_luat_cao_nhat')->nullable();
            $table->tinyInteger('bi_dich_bat')->nullable();
            $table->string('xuat_than')->nullable();
            $table->string('hoc_ham')->nullable();
            $table->string('dac_diem_lich_su_ban_than')->nullable();
            $table->string('dac_diem_lich_su_ban_than_tai_san')->nullable();
            $table->string('danh_gia_cua_can_bo')->nullable();
            $table->string('tu_nhan_xet_ban_than')->nullable();
            $table->date('ngay_khai')->nullable();
            $table->date('ngay_xac_nhan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            //
        });
    }
}

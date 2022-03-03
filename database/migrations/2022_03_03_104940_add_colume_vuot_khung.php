<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeVuotKhung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->date('ngay_huong_vuot_khung')->nullable();
            $table->date('ngay_cap_bao_hiem')->nullable();
            $table->date('ngay_bo_nhiem_chuc_vu_hien_tai')->nullable();
            $table->string('he_so_phu_cap_chuc_vu_hien_tai')->nullable();
            $table->string('chuc_vu_kiem_nhiem')->nullable();
            $table->date('ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem')->nullable();
            $table->date('ngay_bo_nhiem_ngach')->nullable();
            $table->string('he_so_phu_cap_chuc_vu_chuc_vu_kiem_nhiem')->nullable();
            $table->date('moc_xet_tang_luong')->nullable();
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
            $table->dropColumn('ngay_huong_vuot_khung');
            $table->dropColumn('ngay_cap_bao_hiem');
            $table->dropColumn('ngay_bo_nhiem_chuc_vu_hien_tai');
            $table->dropColumn('he_so_phu_cap_chuc_vu_hien_tai');
            $table->dropColumn('chuc_vu_kiem_nhiem');
            $table->dropColumn('ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem');
            $table->dropColumn('he_so_phu_cap_chuc_vu_chuc_vu_kiem_nhiem');
            $table->dropColumn('moc_xet_tang_luong');
            $table->dropColumn('ngay_bo_nhiem_ngach');
        });
    }
}

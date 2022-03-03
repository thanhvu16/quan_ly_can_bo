<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumSoLuoc2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->string('nam_tot_nghiep')->nullable();
            $table->string('ket_qua_xep_loai')->nullable();
            $table->string('trinh_do_quan_ly_kinh_te')->nullable();
            $table->string('tieng_dan_toc')->nullable();
            $table->string('chuc_danh_kh')->nullable();
            $table->string('nam_phong_cd_kh')->nullable();
            $table->string('ngay_vao_doan')->nullable();
            $table->string('noi_vao_doan')->nullable();
            $table->string('chuc_vu_doan')->nullable();
            $table->string('chuc_vu_dang_hien_nay')->nullable();
            $table->date('ngay_giai_ngu')->nullable();
            $table->string('nam_phong_tang_nn_pt')->nullable();
            $table->string('benh_binh')->nullable();

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
            $table->dropColumn('nam_tot_nghiep');
            $table->dropColumn('ket_qua_xep_loai');
            $table->dropColumn('trinh_do_quan_ly_kinh_te');
            $table->dropColumn('tieng_dan_toc');
            $table->dropColumn('chuc_danh_kh');
            $table->dropColumn('nam_phong_cd_kh');
            $table->dropColumn('ngay_vao_doan');
            $table->dropColumn('noi_vao_doan');
            $table->dropColumn('chuc_vu_doan');
            $table->dropColumn('chuc_vu_dang_hien_nay');
            $table->dropColumn('ngay_giai_ngu');
            $table->dropColumn('nam_phong_tang_nn_pt');
            $table->dropColumn('benh_binh');
        });
    }
}

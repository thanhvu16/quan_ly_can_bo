<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanBo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('can_bo', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('gioi_tinh')->nullable()->comment('1: nam, 2: nu');
            $table->date('ngay_sinh')->nullable();
            $table->string('so_the_dang')->nullable();
            $table->string('anh_dai_dien')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('ngay_cap_cmt')->nullable();
            $table->string('so_sohokhau')->nullable();
            $table->string('trinh_do')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('noi_sinh')->nullable();
            $table->string('huyen_noi_sinh')->nullable();
            $table->integer('thanh_pho_noi_sinh')->nullable();
            $table->string('que_quan')->nullable();
            $table->string('huyen_que_quan')->nullable();
            $table->integer('thanh_pho_que_quan')->nullable();
            $table->integer('ho_khau')->nullable();
            $table->integer('noi_o_hien_nay')->nullable();
            $table->date('ngay_vao_don_vi')->nullable();
            $table->string('co_quan_tuyen')->nullable();
            $table->string('nghe_nghiep_khi_duoc_tuyen')->nullable();
            $table->date('ngay_bat_dau_di_lam')->nullable();
            $table->integer('chuc_vu_hien_tai')->nullable();
            $table->string('chuc_danh')->nullable();
            $table->integer('ngach_cong_chuc')->nullable();
            $table->string('ma_ngach')->nullable();
            $table->integer('bac_luong')->nullable();
            $table->integer('he_so_luong')->nullable();
            $table->date('ngay_huong')->nullable();
            $table->integer('som')->nullable();
            $table->integer('phu_cap_cv')->nullable();
            $table->string('phu_cap_khac')->nullable();
            $table->string('phan_tram_huong')->nullable();
            $table->string('phan_tram_khung')->nullable();
            $table->tinyInteger('BHXH')->nullable()->comment('1=> BHXH');
            $table->tinyInteger('BHYT')->nullable()->comment('1=> BHYT');
            $table->integer('don_vi_id')->nullable();
            $table->integer('trang_thai_cb')->nullable();
            $table->integer('loai_cb')->nullable();
            $table->integer('chuc_vu_id')->nullable();
            $table->integer('hinh_thuc_tuyen')->nullable();
            $table->integer('hinh_thuc_dao_tao_id')->nullable();
            $table->integer('dan_toc')->nullable();
            $table->integer('ton_giao')->nullable();
            $table->integer('trinh_do_pho_thong_id')->nullable();
            $table->integer('trinh_do_chuyen_mon_cao_nhat_id')->nullable();
            $table->integer('chuyen_nganh_id')->nullable();
            $table->integer('chuyen_nganh_id_2')->nullable();
            $table->integer('ly_luan_chinh_tri')->nullable();
            $table->integer('quan_ly_hanh_chinh')->nullable();
            $table->integer('tin_hoc')->nullable();
            $table->integer('tieng_anh')->nullable();
            $table->integer('ngon_ngu')->nullable();
            $table->date('ngay_vao_dang')->nullable();
            $table->date('ngay_vao_dang_chinh_thuc')->nullable();
            $table->date('ngay_tham_gia_to_chuc')->nullable();
            $table->date('nhap_ngu')->nullable();
            $table->date('xuat_ngu')->nullable();
            $table->integer('quan_ham_cao_nhat')->nullable();
            $table->integer('danh_hieu_phong_tang_cao_nhat')->nullable();
            $table->string('so_truong_cong_tac')->nullable();
            $table->string('suc_khoe')->nullable();
            $table->string('chieu_cao')->nullable();
            $table->string('can_nang')->nullable();
            $table->string('thuong_binh')->nullable();
            $table->integer('doi_tuong_chinh_sach')->nullable();
            $table->string('cong_viec_chinh')->nullable();
            $table->string('noi_vao_dang')->nullable();
            $table->integer('chuc_vu_cao_nhat')->nullable();
            $table->integer('don_vi')->nullable();
            $table->tinyInteger('da_di_bo_doi')->nullable()->comment('1=> đã đi bộ đội');
            $table->tinyInteger('dao_tao_nuoc_ngoai')->nullable()->comment('1=> đào tạo nước ngoài');
            $table->tinyInteger('la_dang_vien')->nullable()->comment('1=> đảng viên');
            $table->tinyInteger('trang_thai')->nullable()->comment('1=> hoat dong', '2 => khoa');
            $table->tinyInteger('trung_uong_quan_ly')->nullable()->comment('1=> trung_uong_quan_ly');
            $table->tinyInteger('lam_cong_tac_quan_ly')->nullable()->comment('1=> lam_cong_tac_quan_ly');

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
        Schema::dropIfExists('can_bo');
    }
}

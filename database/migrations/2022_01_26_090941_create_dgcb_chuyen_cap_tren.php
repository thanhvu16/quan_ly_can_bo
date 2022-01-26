<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDgcbChuyenCapTren extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dgcb_chuyen_cap_tren', function (Blueprint $table) {
            $table->id();
            $table->integer('can_bo_chuyen')->nullable();
            $table->integer('can_bo_nhan')->nullable();
            $table->float('diem')->nullable();
            $table->string('nhan_xet')->nullable();
            $table->integer('thang')->nullable();
            $table->integer('don_vi_id')->nullable();
            $table->integer('can_bo_goc')->nullable();
            $table->integer('danh_gia_chot')->nullable();
            $table->tinyInteger('cap_danh_gia')->default(1);
            $table->tinyInteger('da_danh_gia_xong')->default(1);
            $table->integer('parent_id')->nullable();
            $table->integer('id_dau_tien')->nullable();
            $table->integer('danh_gia_id')->nullable();
            $table->tinyInteger('lanh_dao_da_danh_gia')->default(1);
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
        Schema::dropIfExists('dgcb_chuyen_cap_tren');
    }
}

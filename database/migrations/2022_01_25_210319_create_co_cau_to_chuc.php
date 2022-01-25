<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoCauToChuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_chuc', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('ten_don_vi')->nullable();
            $table->string('ten_viet_tat')->nullable();
            $table->string('ma_hanh_chinh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->integer('so_dien_thoai')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('cap_xa')->nullable();
            $table->integer('nhom_don_vi')->nullable();
            $table->integer('thu_tu')->nullable();
            $table->tinyInteger('cap_chi_nhanh')->nullable();
            $table->tinyInteger('dieu_hanh')->default(1)->comment('1: Có điều hành 0: không có điều hành');
            $table->tinyInteger('migrated')->nullable()->comment('1: da chay migrate null: chua chay migrate');
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
        Schema::dropIfExists('to_chuc');
    }
}

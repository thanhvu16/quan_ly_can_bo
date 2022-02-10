<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoSoTraLaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ho_so_tra_lai', function (Blueprint $table) {
            $table->id();
            $table->integer('can_bo_id');
            $table->integer('can_bo_chuyen_id')->nullable()->comment('id tbl user');
            $table->integer('can_bo_nhan_id')->nullable()->comment('id tbl user');
            $table->integer('don_vi_tao_id')->nullable();
            $table->string('noi_dung')->nullable();
            $table->tinyInteger('status')->nullable()->comment('1: da giai quyet');
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
        Schema::dropIfExists('ho_so_tra_lai');
    }
}

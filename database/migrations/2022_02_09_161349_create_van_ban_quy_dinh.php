<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVanBanQuyDinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('van_ban_quy_dinh', function (Blueprint $table) {
            $table->id();
            $table->string('so_ky_hieu')->nullable();
            $table->date('ngay_ban_hanh')->nullable();
            $table->string('co_quan_ban_hanh')->nullable();
            $table->string('nguoi_ky')->nullable();
            $table->string('chuc_vu')->nullable();
            $table->string('trich_yeu')->nullable();
            $table->string('file')->nullable();
            $table->string('nguoi_tao')->nullable();
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
        Schema::dropIfExists('van_ban_quy_dinh');
    }
}

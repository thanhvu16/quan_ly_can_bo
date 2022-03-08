<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuocHoiColumeDaoTao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_tham_gia_quoc_hoi', function (Blueprint $table) {
            $table->id();
            $table->date('tu_ngay')->nullable();
            $table->date('den_ngay')->nullable();
            $table->integer('users')->nullable();
            $table->string('loai_hinh_dai_bieu')->nullable();
            $table->string('nhiem_ky')->nullable();
            $table->string('thong_tin')->nullable();
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
        Schema::dropIfExists('qua_trinh_tham_gia_quoc_hoi');
    }
}

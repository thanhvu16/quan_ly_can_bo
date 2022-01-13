<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauHinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cau_hinh', function (Blueprint $table) {
            $table->id();
            $table->string('ten_don_vi')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('dien_thoai')->nullable();
            $table->string('Fax')->nullable();
            $table->string('thu_dien_tu')->nullable();
            $table->string('mat_khau_dien_tu')->nullable();
            $table->string('host')->nullable();
            $table->string('port_smtp')->nullable();
            $table->string('bao_mat')->nullable();
            $table->string('port_pop3')->nullable();
            $table->string('licht7')->nullable();
            $table->string('lichcn')->nullable();
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
        Schema::dropIfExists('cau_hinh');
    }
}

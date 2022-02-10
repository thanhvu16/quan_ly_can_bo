<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiChaChinhSach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tra_chinh_sach', function (Blueprint $table) {
            $table->id();
            $table->string('doi_tuong')->nullable();
            $table->string('file')->nullable();
            $table->string('noi_dung_chi_tra')->nullable();
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
        Schema::dropIfExists('chi_tra_chinh_sach');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeBacLuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bac_he_so_luong', function (Blueprint $table) {
            $table->string('bac_luong')->nullable();
            $table->string('ma_ngach')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bac_he_so_luong', function (Blueprint $table) {
           $table->dropColumn('bac_luong');
           $table->dropColumn('ma_ngach');
        });
    }
}

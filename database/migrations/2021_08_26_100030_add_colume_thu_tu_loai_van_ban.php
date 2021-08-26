<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeThuTuLoaiVanBan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loai_van_ban', function (Blueprint $table) {
            $table->integer('thu_tu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loai_van_ban', function (Blueprint $table) {
            $table->dropColumn('thu_tu');
        });
    }
}

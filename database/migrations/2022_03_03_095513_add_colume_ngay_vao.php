<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeNgayVao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->date('tuyen_dung_chinh_thuc')->nullable();
            $table->date('tuyen_dung_dau_tien')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->dropColumn('tuyen_dung_dau_tien');
            $table->dropColumn('tuyen_dung_chinh_thuc');
        });
    }
}

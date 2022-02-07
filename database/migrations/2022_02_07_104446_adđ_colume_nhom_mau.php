<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdđColumeNhomMau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->string('nhom_mau')->nullable();
            $table->string('trinh_do_1')->nullable();
            $table->string('trinh_do_2')->nullable();
            $table->string('bang1')->nullable();
            $table->string('bang2')->nullable();
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
            $table->dropColumn('nhom_mau');
        });
    }
}

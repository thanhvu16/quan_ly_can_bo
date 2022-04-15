<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeHuu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->date('ngay_ve_huu')->nullable();
            $table->tinyInteger('can_bo_bo_nhiem')->nullable();
            $table->tinyInteger('can_bo_bo_nhiem_lai')->nullable();
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
            $table->dropColumn('ngay_ve_huu');
            $table->dropColumn('can_bo_bo_nhiem');
            $table->dropColumn('can_bo_bo_nhiem_lai');
        });
    }
}

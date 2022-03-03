<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumSoLuoc3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->string('nhan_than_nuoc_ngoai')->nullable();

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
            $table->dropColumn('nhan_than_nuoc_ngoai');
        });
    }
}

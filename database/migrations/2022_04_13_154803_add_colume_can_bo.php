<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeCanBo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dot_cap_the_dang', function (Blueprint $table) {
            $table->integer('can_bo_nhan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dot_cap_the_dang', function (Blueprint $table) {
            $table->dropColumn('can_bo_nhan');
        });
    }
}

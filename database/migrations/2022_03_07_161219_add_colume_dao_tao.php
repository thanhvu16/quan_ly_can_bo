<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeDaoTao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qua_trinh_dao_tao', function (Blueprint $table) {
            $table->string('ten_chuyen_nganh')->nullable();
            $table->string('nuoc_dao_tao')->nullable();
            $table->string('chung_chi')->nullable();
            $table->string('kinh_phi')->nullable();
            $table->string('chuc_vu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qua_trinh_dao_tao', function (Blueprint $table) {
            //
        });
    }
}

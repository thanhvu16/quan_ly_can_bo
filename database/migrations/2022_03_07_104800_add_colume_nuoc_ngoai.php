<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeNuocNgoai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qua_trinh_nuoc_ngoai', function (Blueprint $table) {
            $table->string('ten_nuoc')->nullable();
            $table->string('kinh_phi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qua_trinh_nuoc_ngoai', function (Blueprint $table) {
            $table->dropColumn('ten_nuoc');
            $table->dropColumn('kinh_phi');
        });
    }
}

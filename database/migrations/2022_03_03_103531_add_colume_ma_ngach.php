<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeMaNgach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ngach_chuc_danh', function (Blueprint $table) {
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
        Schema::table('ngach_chuc_danh', function (Blueprint $table) {
            $table->dropColumn('ma_ngach');
        });
    }
}

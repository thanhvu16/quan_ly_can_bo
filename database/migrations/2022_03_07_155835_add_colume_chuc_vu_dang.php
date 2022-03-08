<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeChucVuDang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qua_trinh_chuc_vu_dang', function (Blueprint $table) {
            $table->date('tu_ngay')->nullable();
            $table->date('den_ngay')->nullable();
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
        Schema::table('qua_trinh_chuc_vu_dang', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeViTri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->string('vi_tri_cong_chuc')->nullable();
            $table->string('vi_tri_vien_chuc')->nullable();
            $table->string('vi_tri_nhan_vien')->nullable();
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
            $table->dropColumn('vi_tri_cong_chuc');
            $table->dropColumn('vi_tri_vien_chuc');
            $table->dropColumn('vi_tri_nhan_vien');
        });
    }
}

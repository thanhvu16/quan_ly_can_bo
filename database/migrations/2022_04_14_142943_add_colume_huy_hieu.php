<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeHuyHieu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->tinyInteger('trang_thai_huy_hieu_can_bo')->nullable()->comment('null: chưa lập danh sách, 1: đã lập chờ duyệt, 2 đã duyệt');
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
            $table->dropColumn('trang_thai_huy_hieu_can_bo');
        });
    }
}

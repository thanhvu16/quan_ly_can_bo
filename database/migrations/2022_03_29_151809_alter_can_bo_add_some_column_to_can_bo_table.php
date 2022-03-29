<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCanBoAddSomeColumnToCanBoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->tinyInteger('dang_vien_tinh_khac_chuyen_den')->nullable();
            $table->tinyInteger('dang_vien_huyen_khac_trong_tinh')->nullable();
            $table->tinyInteger('phuc_hoi_dang_tich')->nullable();
            $table->tinyInteger('tu_tran')->nullable();
            $table->tinyInteger('khai_tru')->nullable();
            $table->tinyInteger('xoa_ten')->nullable();
            $table->tinyInteger('xin_ra_khoi_dang')->nullable();
            $table->tinyInteger('chuyen_di_tinh_khac')->nullable();
            $table->tinyInteger('chuyen_di_huyen_khac_trong_tinh')->nullable();
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
            $table->dropColumn('dang_vien_tinh_khac_chuyen_den');
            $table->dropColumn('dang_vien_huyen_khac_trong_tinh');
            $table->dropColumn('phuc_hoi_dang_tich');
            $table->dropColumn('tu_tran');
            $table->dropColumn('khai_tru');
            $table->dropColumn('xoa_ten');
            $table->dropColumn('xin_ra_khoi_dang');
            $table->dropColumn('chuyen_di_tinh_khac');
            $table->dropColumn('chuyen_di_huyen_khac_trong_tinh');
        });
    }
}

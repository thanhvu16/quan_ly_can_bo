<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeNoiCap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->string('noi_cap')->nullable();
            $table->string('so_so_bao_hiem')->nullable();
            $table->string('nghe_nghiep_truoc_khi_tuyen')->nullable();
            $table->string('bi_danh')->nullable();
            $table->string('linh_vuc_theo_doi')->nullable();
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
            $table->dropColumn('noi_cap');
            $table->dropColumn('so_so_bao_hiem');
            $table->dropColumn('nghe_nghiep_truoc_khi_tuyen');
            $table->dropColumn('bi_danh');
            $table->dropColumn('linh_vuc_theo_doi');
        });
    }
}

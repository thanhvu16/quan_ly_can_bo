<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChuyenDonVi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_chuyen_don_vi', function (Blueprint $table) {
            $table->id();
            $table->integer('users')->nullable();
            $table->date('ngay_chuyen')->nullable();
            $table->string('don_vi_chuyen_den')->nullable();
            $table->string('so_quyet_dinh')->nullable();
            $table->date('ngay_quyet_dinh')->nullable();
            $table->string('co_quan')->nullable();
            $table->string('nguoi_ky')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qua_trinh_chuyen_don_vi');
    }
}

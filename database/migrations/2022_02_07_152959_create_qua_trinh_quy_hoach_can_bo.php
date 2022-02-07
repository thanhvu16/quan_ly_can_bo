<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuaTrinhQuyHoachCanBo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_quy_hoach_can_bo', function (Blueprint $table) {
            $table->id();
            $table->integer('users')->nullable();
            $table->date('ngay_quyet_dinh')->nullable();
            $table->string('chuc_vu')->nullable();
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
        Schema::dropIfExists('qua_trinh_quy_hoach_can_bo');
    }
}

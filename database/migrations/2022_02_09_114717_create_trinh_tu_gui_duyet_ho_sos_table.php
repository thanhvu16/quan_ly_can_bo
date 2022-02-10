<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrinhTuGuiDuyetHoSosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trinh_tu_gui_duyet_ho_so', function (Blueprint $table) {
            $table->id();
            $table->integer('can_bo_id')->comment('id table can_bo');
            $table->integer('can_bo_chuyen_id');
            $table->integer('can_bo_nhan_id');
            $table->tinyInteger('status')->nullable()->comment('1: đã xử lý');
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
        Schema::dropIfExists('trinh_tu_gui_duyet_ho_so');
    }
}

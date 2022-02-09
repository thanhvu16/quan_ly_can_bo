<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogDuyetHoSoCanBosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_duyet_ho_so_can_bo', function (Blueprint $table) {
            $table->id();
            $table->string('arr_can_bo_id')->nullable()->comment('id table can_bo');
            $table->integer('user_id')->comment('id tbl user nguoi duyet ho so');
            $table->tinyInteger('status')->nullable()->comment('1 duyet, 2 tra lai');
            $table->integer('don_vi_tao_id')->nullable();
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
        Schema::dropIfExists('log_duyet_ho_so_can_bo');
    }
}

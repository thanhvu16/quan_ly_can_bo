<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQlBaoHiem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_bao_hiem', function (Blueprint $table) {
            $table->id();
            $table->integer('users')->nullable();
            $table->date('tu_ngay')->nullable();
            $table->date('den_ngay')->nullable();
            $table->string('thanh_pho');
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
        Schema::dropIfExists('qua_trinh_bao_hiem');
    }
}

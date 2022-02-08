<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQlKhenThuongKyLuat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_khen_thuong_ky_luat', function (Blueprint $table) {
            $table->id();
            $table->integer('users')->nullable();
            $table->string('so_quyet_dinh')->nullable();
            $table->date('ngay_quyet_dinh')->nullable();
            $table->string('noi_dung')->nullable();
            $table->string('co_quan')->nullable();
            $table->string('ly_do')->nullable();
            $table->tinyInteger('type')->comment('1: kỷ luật 2 khen thưởng')->nullable();
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
        Schema::dropIfExists('qua_trinh_khen_thuong_ky_luat');
    }
}

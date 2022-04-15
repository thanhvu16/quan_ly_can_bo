<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDotCapTheDang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dot_cap_the_dang', function (Blueprint $table) {
            $table->id();
            $table->date('dot_cap_the')->nullable();
            $table->integer('don_vi_id')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->tinyInteger('trang_thai')->comment('1 là đã được lãnh đạo duyệt')->nullable();
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
        Schema::dropIfExists('dot_cap_the_dang');
    }
}

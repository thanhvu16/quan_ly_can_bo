<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDotCapHuyHieuDang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dot_cap_huy_hieu', function (Blueprint $table) {
            $table->id();
            $table->integer('can_bo_nhan')->nullable();
            $table->date('dot_cap_the')->nullable();
            $table->integer('don_vi_id')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->tinyInteger('trang_thai')->comment('1 là chờ lãnh đạo duyệt 2 đã duyệt')->nullable();
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
        Schema::dropIfExists('dot_cap_huy_hieu');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopDaoTaoHocVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qldt_hoc_vien_dao_tao', function (Blueprint $table) {
            $table->id();
            $table->string('ten_hoc_vien')->nullable();
            $table->integer('khoa_hoc_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('qldt_hoc_vien_dao_tao');
    }
}

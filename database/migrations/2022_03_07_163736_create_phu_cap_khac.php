<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhuCapKhac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_phu_cap_khac', function (Blueprint $table) {
            $table->id();
            $table->date('tu_ngay')->nullable();
            $table->date('den_ngay')->nullable();
            $table->integer('users')->nullable();
            $table->string('loai_phu_cap')->nullable();
            $table->string('muc_huong')->nullable();
            $table->string('thanh_tien')->nullable();
            $table->string('cach_tinh')->nullable();
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
        Schema::dropIfExists('qua_trinh_phu_cap_khac');
    }
}

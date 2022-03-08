<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoanColumeDaoTao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qua_trinh_tham_gia_doan', function (Blueprint $table) {
            $table->id();
            $table->date('tu_ngay')->nullable();
            $table->date('den_ngay')->nullable();
            $table->integer('users')->nullable();
            $table->string('chuc_vu')->nullable();
            $table->string('co_quan')->nullable();
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
        Schema::dropIfExists('qua_trinh_tham_gia_doan');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnToCanBoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->tinyInteger('trang_thai_duyet_ho_so')->nullable()->comment('1=>gửi duyệt, 2=>trả lại, 3=>đã duyệt');
            $table->integer('don_vi_tao_id')->nullable()->comment('Đơn vị người tạo cán bộ');
            $table->integer('user_id')->nullable()->comment('nguoi tao can bo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('can_bo', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('don_vi_tao_id');
            $table->dropColumn('trang_thai_duyet_ho_so');
        });
    }
}

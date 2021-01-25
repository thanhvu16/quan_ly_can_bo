<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeChatLuongToNullableInReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lct_thanh_phan_du_hop', function (Blueprint $table) {
            $table->dropColumn('chat_luong');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lct_thanh_phan_du_hop', function (Blueprint $table) {
        });
    }
}

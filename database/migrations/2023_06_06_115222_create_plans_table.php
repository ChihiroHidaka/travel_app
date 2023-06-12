<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::create('plans', function (Blueprint $table) {
        $table->id('id');  // 主キー
        $table->foreignId('travel_id'); // 旅行ID
        $table->foreignId('user_id'); // ユーザーID
        $table->date('plan_date'); // 日時
        $table->time('from_time'); // 開始時間
        $table->time('end_time'); // 終了時間
        $table->text('plan'); // プラン内容（目的地もしくは移動手段
        $table->text('remarks')->nullable(); // メモ、テキスト型, NULLを許容
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('travel_id')->references('id')->on('travels');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};

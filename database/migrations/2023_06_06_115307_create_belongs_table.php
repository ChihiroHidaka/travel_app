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
        Schema::create('belongs', function (Blueprint $table) {
            $table->id('id');  // 主キー
            $table->text('belongs_name');//持ち物名
            $table->foreignId('user_id'); // ユーザーID
            $table->boolean('checked');
            $table->date('created_at');
            $table->date('updated_at');
            $table->foreign('user_id')->references('id')->on('users');
          
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('belongs');
    }
};

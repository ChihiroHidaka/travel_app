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
        Schema::create('travels', function (Blueprint $table) {
            $table->id('id');
            $table->text('title');
            $table->foreignid('user_id');
            $table->foreignid('group_id');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('image_path')->nullable();
            $table->date('created_at');
            $table->date('updated_at');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travels');
    }
};

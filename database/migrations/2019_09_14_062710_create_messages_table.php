<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('content', 255)->comment('内容');

            $table->unsignedBigInteger('user_id')->comment('作者');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('reply_id')->default(0)->comment('被回复编号');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

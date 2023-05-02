<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['accept', 'rejected', 'pending'])->default('pending');
            $table->longText('content');
            $table->text('admin_comment');
            $table->integer('lang')->default(1);
            $table->boolean('close')->default(0);
            $table->timestamps();
            $table->bigInteger('forum_user_id')->unsigned();
            $table->bigInteger('casino_id')->unsigned();
            $table->foreign('forum_user_id')->references('id')->on('forum_users');
            $table->foreign('casino_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}

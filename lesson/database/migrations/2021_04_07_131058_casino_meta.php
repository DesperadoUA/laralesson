<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CasinoMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casino_meta', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned();
            $table->text('bonuses');
            $table->text('currency');
            $table->text('faq');
            $table->text('faq_title');
            $table->text('methods_pay');
            $table->text('methods_payout');
            $table->string('min_deposit');
            $table->string('min_payout');
            $table->integer('rating');
            $table->string('ref');
            $table->string('sub_title');
            $table->string('valuta');
            $table->text('vendors');
            $table->string('video_banner');
            $table->string('video_iframe');
            $table->unique('post_id');
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casino_meta');
    }
}

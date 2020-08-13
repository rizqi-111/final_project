<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoteJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_jawabans', function (Blueprint $table) {
            $table->id();
            $table->boolean('up_or_down');
            $table->bigInteger('jawaban_id')->unsigned()->nullable();
            $table->foreign('jawaban_id')->references('id')->on('jawaban');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('vote_jawabans', function (Blueprint $table) {
            $table->dropForeign('vote_jawabans_user_id_foreign');
            $table->dropForeign('vote_jawabans_jawaban_id_foreign');
        });

        Schema::dropIfExists('vote_jawabans');
    }
}

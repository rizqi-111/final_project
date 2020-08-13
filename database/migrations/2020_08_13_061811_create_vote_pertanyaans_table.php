<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->boolean('up_or_down');
            $table->bigInteger('pertanyaan_id')->unsigned()->nullable();
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaans');
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
        Schema::table('vote_pertanyaans', function (Blueprint $table) {
            $table->dropForeign('vote_pertanyaans_user_id_foreign');
            $table->dropForeign('vote_pertanyaans_pertanyaan_id_foreign');
        });

        Schema::dropIfExists('vote_pertanyaans');
    }
}

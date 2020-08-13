<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_jawabans', function (Blueprint $table) {
            $table->id();
            $table->string('isi');
            $table->dateTime('created_at');
            $table->bigInteger('jawaban_id')->unsigned()->nullable();
            $table->foreign('jawaban_id')->references('id')->on('jawaban');
            $table->bigInteger('user_id')->unsigned()->nullable();
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
        Schema::table('komentar_jawabans', function (Blueprint $table) {
            $table->dropForeign('komentar_jawabans_user_id_foreign');
            $table->dropForeign('komentar_jawabans_jawaban_id_foreign');
        });

        Schema::dropIfExists('komentar_jawabans');
    }
}

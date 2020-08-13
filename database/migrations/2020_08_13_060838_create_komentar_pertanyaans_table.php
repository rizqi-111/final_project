<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarPertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->string('isi');
            $table->dateTime('created_at');
            $table->bigInteger('pertanyaan_id')->unsigned()->nullable();
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaans');
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
        Schema::table('komentar_pertanyaans', function (Blueprint $table) {
            $table->dropForeign('komentar_pertanyaans_user_id_foreign');
            $table->dropForeign('komentar_pertanyaans_pertanyaan_id_foreign');
        });
        Schema::dropIfExists('komentar_pertanyaans');
    }
}

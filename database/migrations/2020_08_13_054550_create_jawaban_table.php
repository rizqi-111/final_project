<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id();
            $table->string('isi');
            $table->bigInteger('pertanyaan_id')->unsigned()->nullable();
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaans');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::table('pertanyaans',function (Blueprint $table) {
            $table->foreign('jawaban_tepat_id')->references('id')->on('jawaban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jawaban',function (Blueprint $table) {
            $table->dropForeign('jawaban_user_id_foreign');
            $table->dropForeign('jawaban_pertanyaan_id_foreign');
        });

        Schema::table('pertanyaans',function (Blueprint $table) {
            $table->dropForeign('pertanyaans_jawaban_tepat_id_foreign');
        });

        Schema::dropIfExists('jawaban');
    }
}

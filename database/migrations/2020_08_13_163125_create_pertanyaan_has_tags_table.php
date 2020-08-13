<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanHasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_has_tags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pertanyaan_id')->unsigned();
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaans');
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pertanyaan_has_tags',function (Blueprint $table) {
            $table->dropForeign('pertanyaan_has_tags_pertanyaan_id_foreign');
            $table->dropForeign('pertanyaan_has_tags_tag_id_foreign');
        });

        Schema::dropIfExists('pertanyaan_has_tags');
    }
}

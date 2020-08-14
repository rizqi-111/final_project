<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePertanyaanHasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::rename('pertanyaan_has_tags','pertanyaan_tag');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pertanyaan_tag',function (Blueprint $table) {
            // $table->dropForeign('pertanyaan_tag_pertanyaan_id_foreign');
            // $table->dropForeign('pertanyaan_tag_tag_id_foreign');
        });
    }
}

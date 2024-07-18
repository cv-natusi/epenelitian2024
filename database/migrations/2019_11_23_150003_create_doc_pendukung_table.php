<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocPendukungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('doc_pendukung', function (Blueprint $table) {
            $table->increments('id_file');

            $table->integer('permohonan_id')->unsigned();
            $table->integer('jenis_file')->unsigned();
            $table->string('nama_file');
            $table->string('doc_status');
            $table->string('catatan')->nullable();
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
            Schema::dropIfExists('doc_pendukung');
    }
}

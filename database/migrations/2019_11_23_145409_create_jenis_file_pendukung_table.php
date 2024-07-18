<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisFilePendukungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('jenis_file_pendukung', function (Blueprint $table) {
            $table->increments('id_jenis_file');

            $table->string('nama_jenis');
            $table->string('nama_form');
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
            Schema::dropIfExists('jenis_file_pendukung');
    }
}

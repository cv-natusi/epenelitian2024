<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisPenelitianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('jenis_penelitian', function (Blueprint $table) {
            $table->increments('id_jenis_penelitian');

            $table->string('nama_jenis');
            $table->string('keterangan');
            $table->integer('parrent_id');
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
        Schema::dropIfExists('jenis_penelitian');
    }
}

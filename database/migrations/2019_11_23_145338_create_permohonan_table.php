<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('permohonan', function (Blueprint $table) {
            $table->increments('id_permohonan');
            $table->string('judul_penelitian');
            $table->integer('jenis_penelitian_id')->unsigned()->nullable();
            $table->date('tgl_pengajuan');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');            
            $table->integer('users_id')->unsigned();
            $table->string('status');
            $table->string('surat_ijin')->nullable();
            $table->date('estimasi_waktu')->nullable();
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
        Schema::dropIfExists('permohonan');
    }
}

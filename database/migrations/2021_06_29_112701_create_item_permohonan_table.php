<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemPermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('item_permohonan', function (Blueprint $table) {
            $table->increments('id_item_permohonan');
            $table->integer('permohonan_id');
            $table->string('upload_proposal_penelitian')->nullable();
            $table->string('upload_surat_pengantar')->nullable();
            $table->string('upload_surat_rekomendasi')->nullable();
            $table->string('upload_surat_pernyataan')->nullable();
            $table->string('upload_surat_kesediaan')->nullable();
            $table->string('upload_surat_izin')->nullable();
            $table->string('doc_status');
            $table->string('catatan')->nullable();
            $table->string('acc_admin');
            $table->date('tgl_acc_admin')->nullable();
            $table->string('acc_kasi');
            $table->date('tgl_acc_kasi')->nullable();
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
        Schema::dropIfExists('item_permohonan');
    }
}

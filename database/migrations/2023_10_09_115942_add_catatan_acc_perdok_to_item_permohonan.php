<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCatatanAccPerdokToItemPermohonan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_permohonan', function (Blueprint $table) {
            $table->string('status_proposal_penelitian')->nullable();
            $table->string('catatanadmin_proposal_penelitian')->nullable();
            $table->string('accadmin_proposal_penelitian')->nullable();
            $table->string('tglaccadmin_proposal_penelitian')->nullable();
            $table->string('catatankasi_proposal_penelitian')->nullable();
            $table->string('acckasi_proposal_penelitian')->nullable();
            $table->string('tglacckasi_proposal_penelitian')->nullable();

            $table->string('status_surat_pengantar')->nullable();
            $table->string('catatanadmin_surat_pengantar')->nullable();
            $table->string('accadmin_surat_pengantar')->nullable();
            $table->string('tglaccadmin_surat_pengantar')->nullable();
            $table->string('catatankasi_surat_pengantar')->nullable();
            $table->string('acckasi_surat_pengantar')->nullable();
            $table->string('tglacckasi_surat_pengantar')->nullable();

            $table->string('status_surat_rekomendasi')->nullable();
            $table->string('catatanadmin_surat_rekomendasi')->nullable();
            $table->string('accadmin_surat_rekomendasi')->nullable();
            $table->string('tglaccadmin_surat_rekomendasi')->nullable();
            $table->string('catatankasi_surat_rekomendasi')->nullable();
            $table->string('acckasi_surat_rekomendasi')->nullable();
            $table->string('tglacckasi_surat_rekomendasi')->nullable();

            $table->string('status_surat_pernyataan')->nullable();
            $table->string('catatanadmin_surat_pernyataan')->nullable();
            $table->string('accadmin_surat_pernyataan')->nullable();
            $table->string('tglaccadmin_surat_pernyataan')->nullable();
            $table->string('catatankasi_surat_pernyataan')->nullable();
            $table->string('acckasi_surat_pernyataan')->nullable();
            $table->string('tglacckasi_surat_pernyataan')->nullable();

            $table->string('status_surat_kesediaan')->nullable();
            $table->string('catatanadmin_surat_kesediaan')->nullable();
            $table->string('accadmin_surat_kesediaan')->nullable();
            $table->string('tglaccadmin_surat_kesediaan')->nullable();
            $table->string('catatankasi_surat_kesediaan')->nullable();
            $table->string('acckasi_surat_kesediaan')->nullable();
            $table->string('tglacckasi_surat_kesediaan')->nullable();

            $table->string('status_surat_izin')->nullable();
            $table->string('catatanadmin_surat_izin')->nullable();
            $table->string('accadmin_surat_izin')->nullable();
            $table->string('tglaccadmin_surat_izin')->nullable();
            $table->string('catatankasi_surat_izin')->nullable();
            $table->string('acckasi_surat_izin')->nullable();
            $table->string('tglacckasi_surat_izin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_permohonan', function (Blueprint $table) {
            $table->dropColumn('status_proposal_penelitian');
            $table->dropColumn('catatanadmin_proposal_penelitian');
            $table->dropColumn('accadmin_proposal_penelitian');
            $table->dropColumn('tglaccadmin_proposal_penelitian');
            $table->dropColumn('catatankasi_proposal_penelitian');
            $table->dropColumn('acckasi_proposal_penelitian');
            $table->dropColumn('tglacckasi_proposal_penelitian');

            $table->dropColumn('status_surat_pengantar');
            $table->dropColumn('catatanadmin_surat_pengantar');
            $table->dropColumn('accadmin_surat_pengantar');
            $table->dropColumn('tglaccadmin_surat_pengantar');
            $table->dropColumn('catatankasi_surat_pengantar');
            $table->dropColumn('acckasi_surat_pengantar');
            $table->dropColumn('tglacckasi_surat_pengantar');

            $table->dropColumn('status_surat_rekomendasi');
            $table->dropColumn('catatanadmin_surat_rekomendasi');
            $table->dropColumn('accadmin_surat_rekomendasi');
            $table->dropColumn('tglaccadmin_surat_rekomendasi');
            $table->dropColumn('catatankasi_surat_rekomendasi');
            $table->dropColumn('acckasi_surat_rekomendasi');
            $table->dropColumn('tglacckasi_surat_rekomendasi');

            $table->dropColumn('status_surat_pernyataan');
            $table->dropColumn('catatanadmin_surat_pernyataan');
            $table->dropColumn('accadmin_surat_pernyataan');
            $table->dropColumn('tglaccadmin_surat_pernyataan');
            $table->dropColumn('catatankasi_surat_pernyataan');
            $table->dropColumn('acckasi_surat_pernyataan');
            $table->dropColumn('tglacckasi_surat_pernyataan');

            $table->dropColumn('status_surat_kesediaan');
            $table->dropColumn('catatanadmin_surat_kesediaan');
            $table->dropColumn('accadmin_surat_kesediaan');
            $table->dropColumn('tglaccadmin_surat_kesediaan');
            $table->dropColumn('catatankasi_surat_kesediaan');
            $table->dropColumn('acckasi_surat_kesediaan');
            $table->dropColumn('tglacckasi_surat_kesediaan');

            $table->dropColumn('status_surat_izin');
            $table->dropColumn('catatanadmin_surat_izin');
            $table->dropColumn('accadmin_surat_izin');
            $table->dropColumn('tglaccadmin_surat_izin');
            $table->dropColumn('catatankasi_surat_izin');
            $table->dropColumn('acckasi_surat_izin');
            $table->dropColumn('tglacckasi_surat_izin');
        });
    }
}

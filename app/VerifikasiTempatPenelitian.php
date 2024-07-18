<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifikasiTempatPenelitian extends Model
{
    protected $table='verifikasi_tempat_penelitian';
  	protected $primaryKey='id_verifikasi_tp';
  	public $timestamps=false;
}

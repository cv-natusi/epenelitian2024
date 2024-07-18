<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilPenelitian extends Model
{
    protected $table = 'hasil_penelitian';
    protected $primaryKey = 'id_hasil_penelitian';

    public $timestamps = false;
}

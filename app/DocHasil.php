<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocHasil extends Model
{
    protected $table = 'doc_hasil';
    protected $primaryKey = 'id_doc_hasil';

    public $timestamps = false;
}

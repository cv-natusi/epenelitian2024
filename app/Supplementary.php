<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplementary extends Model
{
    protected $table = 'supplementaries';
    protected $fillable = ['id','submission_id','title','file','file_size','date','creator','keywords','type','description','publisher','agencies','lang'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function submission()
    {
        return $this->bolongsTo('App\Submission', 'submission_id');      
    }
}

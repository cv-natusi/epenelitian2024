<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author_submit extends Model
{
    
    protected $table = 'author_submits';
    protected $fillable = ['id','submission_id','first_name','middle_name','last_name','email','id_orcid','url','affiliation','country','interest','bio'];
    protected $primaryKey = 'id';
    public $timestamps = true;

     public function submission()
    {
    	return $this->belongsTo('App\Submission', 'submission_id');
    }
}

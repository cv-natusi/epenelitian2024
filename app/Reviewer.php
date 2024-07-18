<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
     protected $table = 'reviewers';
    protected $fillable = ['id','submission_id','users_id','file_sub','description','status'];
    protected $primaryKey = 'id';
    public $timestamps = true;

     public function submission()
    {
    	return $this->belongsTo('App\Submission', 'submission_id');
    }

     public function reviewer()
    {
    	return $this->belongsTo('App\User', 'users_id');
    }
}

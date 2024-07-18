<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = ['username','password','users_id','salutation','first_name','middle_name','last_name','category','initials','gender','pendidikan_terakhir','affiliation','signature','email','id_orcid','url','phone','fax','mailing_ads','country','bio','confirm_reg','identify',
    'image','unit_instansi','unit_kerja','no_identitas'];

    public function users()
    {
    	return $this->belongsTo('App\Users', 'users_id');
    }

}

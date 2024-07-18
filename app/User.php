<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $table='users';
      protected $primaryKey='id';
      public $timestamps=true;

    protected $fillable = [
        'username', 'email', 'password', 'tempat_penelitian_id', 'level', 'is_banned',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function submission()
    {
        return $this->hasMany('App\Submission');
    }

    public function reviewer(Request $request)
    {
        return $this->hasOne('App\Reviewer');
    }

    public function file_pendukung(Request $request)
    {
        return $this->hasOne('App\File_pendukung');
    }

     public function permohonan()
    {
        return $this->hasMany('App\Permohonan');
    }

       public function tempat_penelitian()
    {
        return $this->belongsTo('App\Tempat_Penelitian', 'tempat_penelitian_id');
    }
}

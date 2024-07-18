<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;

class Submission extends Model
{
    protected $table = 'submissions';
    protected $fillable = ['id','users_id', 'permohonan_id', 'comments','file_submission','original_filename','file_size','title','lang','abstract','agencies','references','status'];
    protected $primaryKey = 'id';
    public $timestamps = true ;

    public function author_submit()
    {
        return $this->hasMany('App\Author_submit');
    }

     public function supplementary()
    {
        return $this->hasMany('App\Supplementary');
    }

    public function reviewer()
    {
        return $this->hasMany('App\Reviewer');
    }

     public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function permohonan()
    {
        return $this->belongsTo('App\Permohonan', 'permohonan_id');
    }

    public static function getJsonPending($input)
    {
        $table  = 'submissions as sub';
        $select = 'prof.*,sub.*';

        $replace_field  = [
            ['old_name' => 'image', 'new_name' => 'photo_user'],
        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;

        $data = $datagrid->datagrid_query($param, function($data){
            return $data->join('profiles as prof', 'prof.users_id','=','sub.users_id')->where('sub.status','pending');
        });

        return $data;
    }

    public static function getJsonReview($input)
    {
        $table  = 'submissions as sub';
        $select = 'prof.*,sub.*';

        $replace_field  = [
            ['old_name' => 'image', 'new_name' => 'photo_user'],
        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;

        $data = $datagrid->datagrid_query($param, function($data){
            return $data->join('profiles as prof', 'prof.users_id','=','sub.users_id')->where('sub.status','in_review')->where('prof.category','pns');
        });

        return $data;
    }

    public static function getJsonRevisi($input)
    {
        $table  = 'submissions as sub';
        $select = 'sub.*';

        $replace_field  = [
            ['old_name' => 'image', 'new_name' => 'photo_user'],
        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;

        $data = $datagrid->datagrid_query($param, function($data){
            return $data->where('status','in_revisi');
        });

        return $data;
    }

    public static function getJsonAccept($input)
    {
        $table  = 'submissions as sub';
        $select = 'sub.*';

        $replace_field  = [
            ['old_name' => 'image', 'new_name' => 'photo_user'],
        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;

        $data = $datagrid->datagrid_query($param, function($data){
            return $data->where('status','accept');
        });

        return $data;
    }

    public static function getJsonPublish($input)
    {
        $table  = 'submissions as sub';
        $select = 'sub.*';

        $replace_field  = [
            ['old_name' => 'image', 'new_name' => 'photo_user'],
        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;

        $data = $datagrid->datagrid_query($param, function($data){
            return $data->where('status','publish');
        });

        return $data;
    }
}

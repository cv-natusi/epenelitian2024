<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;

class Tempat_Penelitian extends Model
{
    protected $table = 'tempat_penelitian';
    protected $primaryKey = 'id_tempat_penelitian';
    protected $fillable = ['nama_tempat','parrent_id'];
    public $timestamps = true ;

     public function permohonan()
    {
        return $this->hasMany('App\Permohonan');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }


   public static function getJsonTempatPenelitian($input)
    {
        $table  = 'tempat_penelitian as tmp';
        $select = 'tmp.*';

      $replace_field  = [
        ['old_name' => 'nama_tempat', 'new_name' => 'nama_tempat'],
        ['old_name' => 'kategori', 'new_name' => 'kategori'],
      ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;

        $data = $datagrid->datagrid_query($param, function($data){
            return $data;
        });

        return $data;
    }
}

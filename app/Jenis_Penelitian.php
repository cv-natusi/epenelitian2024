<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;

class Jenis_Penelitian extends Model
{
    protected $table = 'jenis_penelitian';
    protected $primaryKey = 'id_jenis_penelitian';
    protected $fillable = ['nama_jenis','keterangan','parrent_id'];
    public $timestamps = true ;

     public function permohonan()
    {
        return $this->hasMany('App\Permohonan');
    }


   public static function getJsonJenisPenelitian($input)
    {
        $table  = 'jenis_penelitian as jns';
        $select = 'jns.*';

      $replace_field  = [
        ['old_name' => 'nama_jenis', 'new_name' => 'nama_jenis'],
        ['old_name' => 'keterangan', 'new_name' => 'keterangan'],
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

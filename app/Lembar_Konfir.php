<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;

class Lembar_Konfir extends Model
{
    protected $table = 'lembar_konfirmasi';
    protected $primaryKey = 'id_lembar';
    public $timestamps = false;

    public static function datagridlembar_konfir($input)
    {
        $table  = 'lembar_konfirmasi as lk';
        $select = 'lk.*';

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

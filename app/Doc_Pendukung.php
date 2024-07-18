<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;

class Doc_Pendukung extends Model
{
    protected $table = 'doc_pendukung';
    protected $primaryKey = 'id_file';
    protected $fillable = ['permohonan_id','jenis_file','nama_file','doc_status'];

   public static function getJsonMenunggu($input)
    {
        $table  = 'doc_pendukung as doc';
        $select = 'doc.*';

      $replace_field  = [
        ['old_name' => 'jenis_file', 'new_name' => 'file_jenis'],
        ['old_name' => 'status', 'new_name' => 'doc_status'],
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

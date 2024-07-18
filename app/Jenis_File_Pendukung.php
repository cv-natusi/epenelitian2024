<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;

class Jenis_File_Pendukung extends Model
{
    protected $table = 'jenis_file_pendukung';
    protected $primaryKey = 'id_jenis_file';
    protected $fillable = ['nama_jenis','nama_form'];
    public $timestamps = true ;

   public static function getJsonJenisFilePendukung($input)
    {
        $table  = 'jenis_file_pendukung as jfp';
        $select = 'jfp.*';

      $replace_field  = [
        ['old_name' => 'nama_jenis', 'new_name' => 'nama_jenis'],
        ['old_name' => 'nama_form', 'new_name' => 'nama_form'],
      ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;

        $data = $datagrid->datagrid_query($param, function($data){
            return $data;//->whereNull('is_statis');//anas
        });

        return $data;
    }
}

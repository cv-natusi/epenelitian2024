<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;

class ArticlePending extends Model
{
    protected $table='submissions';
    protected $primaryKey='id';
    public $timestamps=false;

    public static function getJsonEditor($input)
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
            return $data;
        });

        return $data;
    }
}

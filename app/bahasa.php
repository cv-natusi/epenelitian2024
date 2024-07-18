<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;

class bahasa extends Model
{
    protected $table = 'bahasa';
    protected $primaryKey = 'id_bahasa';
    public $timestamps = false;

    public static function getJsonBahasa($input)
    {
        $table  = 'bahasa as bhs';
        $select = 'bhs.*';

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
            return $data->orderBy('id_bahasa', 'ASC');
        });

        return $data;
    }
}

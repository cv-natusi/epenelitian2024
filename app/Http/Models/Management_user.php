<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;

class Management_user extends Model
{
  
  protected $table='profiles';
  protected $primaryKey='users_id';
  public $timestamps=false;

  public static function getJsonPemohon($input)
  {
      $table  = 'users as u';
      $select = 'u.*,p.*';
      
      $replace_field  = [
          ['old_name' => 'image', 'new_name' => 'photo_user'],
          ['old_name' => 'username', 'new_name' => 'u.username'],
      ];

      $param = [
          'input'         => $input->all(),
          'select'        => $select,
          'table'         => $table,
          'replace_field' => $replace_field
      ];
      $datagrid = new Datagrid;
      $data = $datagrid->datagrid_query($param, function($data){
          return $data->join('profiles as p', 'u.id','=','p.users_id')->where('u.level','3');
      });
      return $data;
  }

  public static function getJsonTempatPenelitian($input)
  {
      $table  = 'users as u';
      $select = 'u.*';
      
      $replace_field  = [
          ['old_name' => 'image', 'new_name' => 'photo_user'],
          ['old_name' => 'username', 'new_name' => 'u.username'],
      ];

      $param = [
          'input'         => $input->all(),
          'select'        => $select,
          'table'         => $table,
          'replace_field' => $replace_field
      ];
      $datagrid = new Datagrid;
      $data = $datagrid->datagrid_query($param, function($data){
          return $data->where('u.level', '!=', '3');
      });
      return $data;
  }
}


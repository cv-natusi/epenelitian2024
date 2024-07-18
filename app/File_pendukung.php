<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;

class File_pendukung extends Model
{
  protected $table = 'doc_pendukung';
  protected $primaryKey = 'id_file';
  protected $fillable = ['permohonan_id','jenis_file','nama_file','status'];

  public function users()
  {
    return $this->belongsTo('App\Users', 'users_id');
  }
    public function profile()
  {
    return $this->belongsTo('App\Profil');
  }

   public static function getJsonMenunggu($input)
    {
        $table  = 'doc_pendukung as doc';
        $select = "*,concat(first_name, ' ',middle_name, ' ',last_name) as nama_lengkap";


      $replace_field  = [
        ['old_name' => 'statusPermohonan', 'new_name' => 'status_permohonan'],
        ['old_name' => 'no_hp', 'new_name' => 'customer.no_hp'],
      ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;

        $data = $datagrid->datagrid_query($param, function($data){
            return $data->join('users','users.id','doc.users_id')
            			      ->join('profiles','profiles.users_id','doc.users_id')
                        ->where('doc.status','Menunggu Admin');
        });

        return $data;
    }

    public static function getJsonTerima($input)
    {
        $table  = 'doc_pendukung as doc';
        $select = "*,concat(first_name, ' ',middle_name, ' ',last_name) as nama_lengkap";

        $replace_field  = [
            ['old_name' => 'status', 'new_name' => 'satatus_pengajuan'],
            ['old_name' => 'profiles_id', 'new_name' => 'profile_id']

        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;

        $data = $datagrid->datagrid_query($param, function($data){
            return $data->join('users','users.id','doc.users_id')
            			->join('profiles','profiles.users_id','doc.users_id')
                        ->where('doc.status','Terima');
        });

        return $data;
    }

    public static function getJsonTolak($input)
    {
        $table  = 'doc_pendukung as doc';
        $select = "*,concat(first_name, ' ',middle_name, ' ',last_name) as nama_lengkap";

         $replace_field  = [
            ['old_name' => 'status', 'new_name' => 'satatus_pengajuan'],
            ['old_name' => 'profiles_id', 'new_name' => 'profile_id']

        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;

        $data = $datagrid->datagrid_query($param, function($data){
            return $data->join('users','users.id','doc.users_id')
                        ->join('profiles','profiles.users_id','doc.users_id')
                        ->where('doc.status','Tolak');
        });
        return $data;
    }
}

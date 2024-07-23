<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;
use Auth;

class Permohonan extends Model
{
    protected $table = 'permohonan';
    protected $primaryKey = 'id_permohonan';
    protected $fillable = ['judul_penelitan','jenis_penelitian_id','tanggal_pengajuan','users_id'];

    public function jenis_penelitian()
    {
        return $this->belongsTo('App\Jenis_Penelitian', 'jenis_penelitian_id');
    }

     public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Users', 'users_id');
    }

    public function profile()
    {
        return $this->belongsTo('App\Profil');
    }

    public function submismission()
    {
        return $this->hasOne('App\Submission');
    }

    public static function getJsonMenunggu($input)
    {
        $table  = 'permohonan as doc';
        $select = "*,IF(middle_name IS NOT NULL,concat(first_name, ' ',middle_name, ' ',last_name),concat(first_name, ' ',last_name)) as first_name";        

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
          if (Auth::getUser()->level=='1') {
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->leftjoin('verifikasi_tempat_penelitian','verifikasi_tempat_penelitian.permohonan_id','doc.id_permohonan')
            ->where('doc.status','Menunggu Admin');
          }elseif (Auth::getUser()->level=='2') {
            // code...
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->where('doc.status','Menunggu Kasi');
          }elseif (Auth::getUser()->level=='4') {
            // code...
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->where('doc.status','Menunggu Kabid');
          }elseif (Auth::getUser()->level=='6') {
            // code...
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->join('verifikasi_tempat_penelitian', 'verifikasi_tempat_penelitian.permohonan_id','doc.id_permohonan')
            ->join('doc_pendukung', 'doc_pendukung.permohonan_id', '=', 'doc.id_permohonan')
            ->where('verifikasi_tempat_penelitian.tempat_penelitian_id', Auth::User()->tempat_penelitian_id)
            ->where('doc_pendukung.permohonan_id', '>', '0')
            ->where('verifikasi_tempat_penelitian.status_verifikasi','Menunggu');
          }else {
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->where('doc.status','Menunggu Kadin');
          }
        });

        return $data;
    }

    public static function getJsonTerima($input)
    {
        $table  = 'permohonan as doc';
        if (Auth::getUser()->level=='1'){
          $select = "*,IF(middle_name IS NOT NULL,concat(first_name, ' ',middle_name, ' ',last_name),concat(first_name, ' ',last_name)) as first_name,IF(status_hasil IS NULL,'Belum upload hasil',status_hasil) as status_hasil";
        }else{
          $select = "*,IF(middle_name IS NOT NULL,concat(first_name, ' ',middle_name, ' ',last_name),concat(first_name, ' ',last_name)) as first_name,IF(status_hasil IS NULL,'Belum upload hasil',status_hasil) as status_hasil";
        }

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
          if (Auth::getUser()->level=='1') {
            // code...
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('item_permohonan as item', 'item.permohonan_id', 'doc.id_permohonan')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->leftjoin('hasil_penelitian','hasil_penelitian.permohonan_id','doc.id_permohonan')
            ->leftjoin('verifikasi_tempat_penelitian','verifikasi_tempat_penelitian.permohonan_id','doc.id_permohonan')
            ->where('doc.status','Menunggu Kasi')
            ->orWhere('doc.status','Menunggu Kabid')
            ->orWhere('doc.status','Menunggu Kadin')
            ->orWhere('doc.status','Terima')
            ->groupBy('doc.id_permohonan')//anas
            ->groupBy('first_name')
            ->groupBy('hasil_penelitian.status_hasil');
          }elseif (Auth::getUser()->level=='2') {
            // code...
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('item_permohonan as item', 'item.permohonan_id', 'doc.id_permohonan')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->leftjoin('hasil_penelitian','hasil_penelitian.permohonan_id','doc.id_permohonan')
            ->where('doc.status','Menunggu Kabid')
            ->orWhere('doc.status','Menunggu Kadin')
            ->orWhere('doc.status','Terima')
            ->groupBy('doc.id_permohonan')//anas
            ->groupBy('first_name')
            ->groupBy('hasil_penelitian.status_hasil');
          }elseif (Auth::getUser()->level=='4') {
            // code...
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('item_permohonan as item', 'item.permohonan_id', 'doc.id_permohonan')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->leftjoin('hasil_penelitian','hasil_penelitian.permohonan_id','doc.id_permohonan')
            ->where('doc.status','Menunggu Kadin')
            ->orWhere('doc.status','Terima')
            ->groupBy('doc.id_permohonan')//anas
            ->groupBy('first_name')
            ->groupBy('hasil_penelitian.status_hasil');
          }elseif (Auth::getUser()->level=='4') {
            // code...
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('item_permohonan as item', 'item.permohonan_id', 'doc.id_permohonan')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->leftjoin('hasil_penelitian','hasil_penelitian.permohonan_id','doc.id_permohonan')
            ->where('doc.status','Menunggu Kadin')
            ->orWhere('doc.status','Terima')
            ->groupBy('doc.id_permohonan')//anas
            ->groupBy('first_name')
            ->groupBy('hasil_penelitian.status_hasil');
          }elseif (Auth::getUser()->level=='6') {
            // code...
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('item_permohonan as item', 'item.permohonan_id', 'doc.id_permohonan')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->join('verifikasi_tempat_penelitian', 'verifikasi_tempat_penelitian.permohonan_id','doc.id_permohonan')
            ->leftjoin('hasil_penelitian','hasil_penelitian.permohonan_id','doc.id_permohonan')
            ->where('verifikasi_tempat_penelitian.tempat_penelitian_id', Auth::User()->tempat_penelitian_id)
            ->where('verifikasi_tempat_penelitian.status_verifikasi','Terima')
            ->groupBy('doc.id_permohonan')//anas
            ->groupBy('first_name')
            ->groupBy('hasil_penelitian.status_hasil');
          }else {
            // code...
            return $data->join('users','users.id','doc.users_id')
            ->join('profiles','profiles.users_id','doc.users_id')
            ->leftjoin('item_permohonan as item', 'item.permohonan_id', 'doc.id_permohonan')
            ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
            ->leftjoin('hasil_penelitian','hasil_penelitian.permohonan_id','doc.id_permohonan')
            ->where('doc.status','Terima')
            ->groupBy('doc.id_permohonan')//anas
            ->groupBy('first_name')
            ->groupBy('hasil_penelitian.status_hasil');
          }
        });

        return $data;
    }

    public static function getJsonTolak($input)
    {
        $table  = 'permohonan as doc';
        $select = "*,IF(middle_name IS NOT NULL,concat(first_name, ' ',middle_name, ' ',last_name),concat(first_name, ' ',last_name)) as first_name";

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
            if (Auth::getUser()->level=='1' || Auth::getUser()->level=='2') {                
                return $data->join('users','users.id','doc.users_id')
                        ->join('profiles','profiles.users_id','doc.users_id')
                        ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
                        ->leftjoin('verifikasi_tempat_penelitian','verifikasi_tempat_penelitian.permohonan_id','doc.id_permohonan')
                        ->where('doc.status','Tolak');
            }else{
                 return $data->join('users','users.id','doc.users_id')
                        ->join('profiles','profiles.users_id','doc.users_id')
                        ->leftjoin('jenis_penelitian','jenis_penelitian.id_jenis_penelitian','doc.jenis_penelitian_id')
                        ->join('verifikasi_tempat_penelitian', 'verifikasi_tempat_penelitian.permohonan_id','doc.id_permohonan')
                        ->where('verifikasi_tempat_penelitian.tempat_penelitian_id', Auth::User()->tempat_penelitian_id)
                        ->where('verifikasi_tempat_penelitian.status_verifikasi','Tolak');
            }
        });
        return $data;
    }
}

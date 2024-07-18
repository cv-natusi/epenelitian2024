<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bahasa;
use App\HasilPenelitian;
use App\DocHasil;
use App\Profile;
use Validator;
use App\Permohonan;
use App\Http\Libraries\MenuOwner;
use App\Http\Models\Menu;
use App\VerifikasiTempatPenelitian;

use Session,DB,Redirect;

class UploadHasilController extends Controller
{
    function main(Request $request){
      if (!empty(Session::get('id'))) {
        Session()->forget('id');
      }
      $bahasa = [
        'bahasa16' => bahasa::find(16),
      ];

      $id_permohonan = $request->permohonan;
      $permohonan = Permohonan::leftjoin('profiles as p','p.users_id','permohonan.users_id')->where('id_permohonan',$id_permohonan)->first();
      $hasil = HasilPenelitian::where('permohonan_id',$id_permohonan)->first();
      $verifikasi = VerifikasiTempatPenelitian::where('permohonan_id',$permohonan->id_permohonan)->get();              

      $data = [
        'id_menu' => '9',
        'bahasa'=> $bahasa,
        'permohonan'=>$permohonan,
        'jenis_hasil'=>DB::table('jenis_hasil')->orderBy('id_jenis_hasil')->get(),
        'hasil'=>$hasil,
        'verifikasi' => $verifikasi,
      ];
      return view('userhome.hasil.main',$data);
    }

    function simpan(Request $request){
      $validator=Validator::make($request->all(),[
            'kirim' => 'required',
            'abstrak' => 'required',
          ]);
      // return $request->all();
      $id_permohonan = $request->id_permohonan;

      $hasil_penelitian = HasilPenelitian::where('permohonan_id',$id_permohonan)->first();
      if(!empty($hasil_penelitian)){
      }else{
        $hasil_penelitian = new HasilPenelitian;
        $hasil_penelitian->tgl_submit = date('Y-m-d');
      }

      $jenis_hasil = DB::table('jenis_hasil')->orderBy('id_jenis_hasil')->get();

      foreach ($jenis_hasil as $jh) {
        $file_sub_semua = $request->file("file_".$jh->id_jenis_hasil);
        $save_file = DocHasil::where('permohonan_id',$id_permohonan)->where('jenis_hasil_id',$jh->id_jenis_hasil)->first();
        if(!empty($save_file)){
        }else{
          $save_file = new DocHasil;
        }

        if (!empty ($file_sub_semua)) {
          $ext = $file_sub_semua->getClientOriginalExtension();
          if ($ext != 'pdf' && $ext != 'PDF' && $ext != 'jpg' && $ext != 'JPG' && $ext != 'jpeg' && $ext != 'JPEG' && $ext != 'png' && $ext != 'PNG') {
            return Redirect::to('userhome/')
                  ->with('title', 'Maaf !')
                  ->with('message', 'Tidak sesuai! Upload Ulang')
                  ->with('type', 'error');
          }
          $file_sub_semua_new_name     = time() . 'File_pendukung_'.$jh->id_jenis_hasil.'.'.$file_sub_semua->getClientOriginalExtension();
          if(!empty($save_file)){
            if($save_file->nama_file!=''){
              if(file_exists('uploads/hasil_penelitiacaln/'.$save_file->nama_file)){
                unlink('uploads/hasil_penelitian/'.$save_file->nama_file);
              }
            }
          }
          $file_sub_semua->move('uploads/hasil_penelitian', $file_sub_semua_new_name);
          $save_file->nama_file 		   = $file_sub_semua_new_name;
        }

        $save_file->jenis_hasil_id = $jh->id_jenis_hasil;
        $save_file->permohonan_id = $id_permohonan;
        $save_file->save();
      }

      $hasil_penelitian->status_hasil = 'Pending';
      if(isset($request->kirim)){
        $hasil_penelitian->status_hasil = 'Terima';
        $hasil_penelitian->catatan = '-';
      }

      $hasil_penelitian->abstrak = strip_tags($request->abstrak);
      $hasil_penelitian->permohonan_id = $id_permohonan;
      $hasil_penelitian->save();

      Session::flash('pesan','Berhasil disimpan');
      if(isset($request->kirim)){
        return Redirect::to('userhome');
      }

      return Redirect::to('upload-hasil/penelitian/'.$id_permohonan);
    }

    function detail_hasil(Request $request){
      // return $request->all();
      $id_permohonan = $request->id_permohonan;
      $menu = MenuOwner::menuActive('mn_data_pengajuan');
      $pengajuan = Permohonan::leftjoin('hasil_penelitian as hp','hp.permohonan_id','permohonan.id_permohonan')->leftjoin('profiles as p','p.users_id','permohonan.users_id')->where('id_permohonan',$id_permohonan)->first();

      $verifikasi = VerifikasiTempatPenelitian::where('permohonan_id',$pengajuan->id_permohonan)->get();              

      $data = [
        'menus'=>Menu::orderBy('id_menu','desc')->get(),
        'title'		=>'Details Data Pengajuan',
        'permohonan'	=> $pengajuan,
        'verifikasi' => $verifikasi,
      ];
      // return $data;
      $data = array_merge($data,$menu);
      $content = view('userhome.hasil.detail',$data)->render();
      return ['status'=>'success','content'=>$content];
    }

    function doc_hasil(Request $request){
      // return $request->all();
      $id_permohonan = $request->id;
      // return $id_permohonan;

      $menu = MenuOwner::menuActive('mn_data_pengajuan');
      $data = [
        'menus'=>Menu::orderBy('id_menu','desc')->get(),
        'title'		=>'Details Data Pengajuan',
        'pengajuan'	=> DocHasil::join('jenis_hasil as jh','jh.id_jenis_hasil','doc_hasil.jenis_hasil_id')->where('permohonan_id',$id_permohonan)->orderBy('jh.id_jenis_hasil')->get(),
        'permohonan'=>Permohonan::leftjoin('hasil_penelitian as hp','hp.permohonan_id','permohonan.id_permohonan')->leftjoin('profiles as p','p.users_id','permohonan.users_id')->where('id_permohonan',$id_permohonan)->first(),
      ];
      // return $data;
      $data = array_merge($data,$menu);

      $content = view('userhome.hasil.modal',$data)->render(); // ganti lokasi filenya...
      return ['status'=>'success','content'=>$content];
    }

    function approve_hasil(Request $request){
      // return $request->all();
      $id_permohonan = $request->id_permohonan;
      $status = $request->status;
      $catatan = strip_tags($request->catatan);

      $hasil = HasilPenelitian::where('permohonan_id',$id_permohonan)->first();
      if($status=='Terima'){
        $hasil->status_hasil = 'Publish';
      }else if($status=='Tolak'){
        $hasil->status_hasil = 'Tolak';
      }else{
        $hasil->status_hasil = 'Pending';
      }
      $hasil->catatan = $catatan;

      $hasil->save();

      if($hasil){
        return['status'=>'success','st_status'=>$status];
      }
      return['status'=>'error','st_status'=>$status];
    }
}

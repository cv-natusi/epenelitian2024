<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Libraries\MenuOwner;
use App\Http\Models\Identitas;
use App\File_pendukung;
use App\ItemPermohonan;
use App\Lembar_Konfir;
use App\Tempat_Penelitian;
use App\Http\Models\Menu;
use App\Permohonan;
use App\Profile;
use App\User;
use App\Jenis_File_Pendukung;
use App\VerifikasiTempatPenelitian;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File; 
use Auth;
use Session,Redirect;

class PengajuanController extends Controller
{

  function main(Request $request){
    if (isset($request->no)) {
      $no = $request->no;
    }else{
      $no = 1;
    }
    $menu = MenuOwner::menuActive('mn_data_pengajuan');
    $data = [
      'title'=>'Data Pengajuan',
      'pengajuan'=>File_pendukung::all(),
      'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
      'nama_user' => User::where('users.id',Auth::User()->id)->first(),
      'no'=>$no,
    ];
    $data = array_merge($data,$menu);
    return view('owner.pengajuan.main',$data);
  }

  public function datagridmenunggu(Request $request)
  {
    $data = Permohonan::getJsonMenunggu($request);
     for ($i=0; $i < count($data['rows']); $i++) {

      $baris = $data['rows'][$i];

      if (Auth::User()->level==1 || Auth::User()->level==2) {
        $tempat_penelitian = VerifikasiTempatPenelitian::where('permohonan_id',$baris->id_permohonan)->get();
      }else{
        $tempat_penelitian = VerifikasiTempatPenelitian::where('permohonan_id',$baris->id_permohonan)->where('tempat_penelitian_id',Auth::User()->tempat_penelitian_id)->get();        
      }
      
      $nama_tempat_penelitian = '';
      $status_verifikasi = '';
      
      if($tempat_penelitian->count() != 0){
        foreach ($tempat_penelitian as $key) {
          $nama_tempat_penelitian .= '<div style="height:80px; border-bottom:solid 1px #ccc;">'.$key->nama_tempat_penelitian.'</div>';
          $status_verifikasi .= '<div style="height:80px; border-bottom:solid 1px #ccc;">'.$key->status_verifikasi.'</div>';
        }
      }

      $baris->nama_tempat_penelitian = $nama_tempat_penelitian;
      $baris->status_verifikasi = $status_verifikasi;
    }
    return response()->json($data);
  }

  public function datagridterima(Request $request)
  {
    $data = Permohonan::getJsonTerima($request);

    for ($i=0; $i < count($data['rows']); $i++) {

      $get_status_doc = ItemPermohonan::where('permohonan_id',$data['rows'][$i]->id_permohonan)
      ->where('doc_status','Pending')->get();
      $terima = ItemPermohonan::where('permohonan_id',$data['rows'][$i]->id_permohonan)
      ->where('doc_status','Terima')->get();
      $tolak = ItemPermohonan::where('permohonan_id',$data['rows'][$i]->id_permohonan)
      ->where('doc_status','Tolak')->get();
      $surat_ijin = Permohonan::where('id_permohonan',$data['rows'][$i]->id_permohonan)
      ->first();

      if(!empty($surat_ijin)){
        // perlu di review
        if($surat_ijin->tgl_ambil=='' || $surat_ijin->tgl_ambil==null){
          $data['rows'][$i]->menuAksi = '<span style="padding: 5px;font-size: 9pt; border-radius: 5px;color: white;background:#444">Surat belum dikirim</span>';
        }else{
          $data['rows'][$i]->menuAksi = '<span style="padding: 5px;font-size: 9pt; border-radius: 5px;color: white;background:#34f">Surat sudah dikirim</span>';
        }
      }else{
        // belum upload file pendukung
        $data['rows'][$i]->menuAksi = '<span style="padding: 5px;font-size: 9pt; border-radius: 5px;color: white;background:#000">belum upload</span>';
      }

      //milik tempat_penelititan

      $baris = $data['rows'][$i];

      if (Auth::User()->level==1 || Auth::User()->level==2) {
        $tempat_penelitian = VerifikasiTempatPenelitian::where('permohonan_id',$baris->id_permohonan)->get();
      }else{
        $tempat_penelitian = VerifikasiTempatPenelitian::where('permohonan_id',$baris->id_permohonan)->where('tempat_penelitian_id',Auth::User()->tempat_penelitian_id)->get();        
      }
      
      $nama_tempat_penelitian = '';
      $status_verifikasi = '';
      
      if($tempat_penelitian->count() != 0){
        foreach ($tempat_penelitian as $key) {
          $nama_tempat_penelitian .= '<div style="height:80px; border-bottom:solid 1px #ccc;;">'.$key->nama_tempat_penelitian.'</div>';
          $status_verifikasi .= '<div style="height:80px; border-bottom:solid 1px #ccc;;">'.$key->status_verifikasi.'</div>';
        }
      }

      $baris->nama_tempat_penelitian = $nama_tempat_penelitian;
      $baris->status_verifikasi = $status_verifikasi;

    }
    return response()->json($data);
  }

  public function datagridtolak(Request $request)
  {
    $data = Permohonan::getJsonTolak($request);

     for ($i=0; $i < count($data['rows']); $i++) {

      $baris = $data['rows'][$i];
      
      if (Auth::User()->level==1 || Auth::User()->level==2) {
        $tempat_penelitian = VerifikasiTempatPenelitian::where('permohonan_id',$baris->id_permohonan)->get();
      }else{
        $tempat_penelitian = VerifikasiTempatPenelitian::where('permohonan_id',$baris->id_permohonan)->where('tempat_penelitian_id',Auth::User()->tempat_penelitian_id)->get();        
      }
      
      $nama_tempat_penelitian = '';
      $status_verifikasi = '';
      
       if($tempat_penelitian->count() != 0){
        foreach ($tempat_penelitian as $key) {
          $nama_tempat_penelitian .= '<div style="height:80px; border-bottom:solid 1px #ccc;">'.$key->nama_tempat_penelitian.'</div>';
          $status_verifikasi .= '<div style="height:80px; border-bottom:solid 1px #ccc;">'.$key->status_verifikasi.'</div>';
        }
      }

      $baris->nama_tempat_penelitian = $nama_tempat_penelitian;
      $baris->status_verifikasi = $status_verifikasi;
    }
    
    return response()->json($data);
  }

  public function detail_pengajuan(Request $request)
  {
    // return $request->all();
    $id_permohonan = $request->id_permohonan;
    $menu = MenuOwner::menuActive('mn_data_pengajuan');
    $pengajuan = Permohonan::find($id_permohonan);

    $data = [
    'menus'=>Menu::orderBy('id_menu','desc')->get(),
    'title'		=>'Details Data Pengajuan',
    'profile'		=> Profile::where('users_id', $pengajuan->users_id)->first(),
    'pengajuan'	=> $pengajuan,
    ];
    // return $data;
    $data = array_merge($data,$menu);
    $content = view('owner.pengajuan.modal1',$data)->render();
    return ['status'=>'success','content'=>$content];
  }

  public function detail_peneliti(Request $request)
  {
    // return $request->all();
    $id_permohonan = $request->id_permohonan;
    $menu = MenuOwner::menuActive('mn_data_pengajuan');
    $pengajuan = Permohonan::find($id_permohonan);

    $data = [
    'menus'=>Menu::orderBy('id_menu','desc')->get(),
    'title'		=>'Details Data Pengajuan',
    'profile'		=> Profile::where('users_id', $pengajuan->users_id)->first(),
    'pengajuan'	=> $pengajuan,
    ];
    // return $data;
    $data = array_merge($data,$menu);
    $content = view('owner.pengajuan.details_pengajuan',$data)->render();
    return ['status'=>'success','content'=>$content];
  }

   public function detail_verifikasi_pengajuan(Request $request)
  {
    // return $request->all();
    $id_permohonan = $request->id_permohonan;
    $menu = MenuOwner::menuActive('mn_data_pengajuan');
    $pengajuan = Permohonan::find($id_permohonan);

    $data = [
    'menus'=>Menu::orderBy('id_menu','desc')->get(),
    'title'   =>'Details Data Pengajuan',
    'profile'   => Profile::where('users_id', $pengajuan->users_id)->first(),
    'pengajuan' => $pengajuan,
    ];
    // return $data;
    $data = array_merge($data,$menu);
    $content = view('owner.pengajuan.details_verifikasi_pengajuan',$data)->render();
    return ['status'=>'success','content'=>$content];
  }

  public function cetak_konfir(Request $request)
  {
    $id_permohonan = $request->id_permohonan;
    $menu = MenuOwner::menuActive('mn_data_pengajuan');
    $pengajuan = Permohonan::find($id_permohonan);

    $data = [
    'menus'=>Menu::orderBy('id_menu','desc')->get(),
    'title'		=>'Details Data Pengajuan',
    'profile'		=> Profile::where('users_id', $pengajuan->users_id)->first(),
    'pengajuan'	=> $pengajuan,
    ];
    // return $data;
    $data = array_merge($data,$menu);
    $content = view('owner.pengajuan.cetak_konfir',$data)->render();
    return ['status'=>'success','content'=>$content];
  }


  public function doc_pendukung(Request $request)
  {
    // return $request->all();
    $id_permohonan = $request->id;
    // return $id_permohonan;
    $menu = MenuOwner::menuActive('mn_data_pengajuan');
    $data = [
    'menus'=>Menu::orderBy('id_menu','desc')->get(),
    'title'		=>'Details Data Pengajuan',
    // 'pengajuan'	=> Permohonan::where('permohonan.id_permohonan', $id_permohonan)
                              // -> join('item_permohonan as item', 'item.permohonan_id', 'permohonan.id_permohonan')
                              // ->join('doc_pendukung', 'permohonan.id_permohonan', '=', 'doc_pendukung.permohonan_id')
                              // ->join('jenis_file_pendukung', 'doc_pendukung.jenis_file', '=' ,'jenis_file_pendukung.id_jenis_file')
                              // ->first(),
    'pengajuan' =>  ItemPermohonan::join('jenis_file_pendukung as jfp','item_permohonan.jenis_file_id','jfp.id_jenis_file')->where('item_permohonan.permohonan_id', $id_permohonan)->get(),//anas
    ];
    // return $data;
    $data = array_merge($data,$menu);
    $content = view('owner.pengajuan.modal_doc',$data)->render(); // ganti lokasi filenya...
    return ['status'=>'success','content'=>$content];
  }

   public function doc_pendukung_verifikasi(Request $request)
  {
    // return $request->all();
    $id_permohonan = $request->id;
    // return $id_permohonan;
    $menu = MenuOwner::menuActive('mn_data_pengajuan');
    $data = [
    'menus'=>Menu::orderBy('id_menu','desc')->get(),
    'title'   =>'Details Data Pengajuan',
    'pengajuan' => Permohonan::where('permohonan.id_permohonan', $id_permohonan)
                              ->join('doc_pendukung', 'permohonan.id_permohonan', '=', 'doc_pendukung.permohonan_id')
                              ->join('jenis_file_pendukung', 'doc_pendukung.jenis_file', '=' ,'jenis_file_pendukung.id_jenis_file')
                              ->join('verifikasi_tempat_penelitian', 'permohonan.id_permohonan', '=', 'verifikasi_tempat_penelitian.permohonan_id')
                              ->where('verifikasi_tempat_penelitian.tempat_penelitian_id', Auth::User()->tempat_penelitian_id)
                              ->get()
    ];
    // return $data;
    $data = array_merge($data,$menu);
    $content = view('owner.pengajuan.modal_doc_verifikasi',$data)->render(); // ganti lokasi filenya...
    return ['status'=>'success','content'=>$content];
  }

  public function approveFileVerifikasi(Request $request)
  {
  	// return $request->all();
  	$id_verifikasi_tp = $request->id_verifikasi_tp;
  	$status_verifikasi = $request->status_verifikasi;
  	$catatan = $request->catatan;

  	$File = VerifikasiTempatPenelitian::find($id_verifikasi_tp);
  	// return $File;
  	$File->status_verifikasi = $status_verifikasi;
  	$File->catatan = $catatan;
  	$File->save();

  	return ['status' => 'success','data'=>$File];
  }

  public function uploadSuratIzin(Request $request){
    $id_permohonan = $request -> id_permohonan;
    $upload_surat_izin = $request -> upload_surat_izin;
    $destinationPath = 'uploads/file_upload_persyaratan';
    $permohonan = Permohonan::find($id_permohonan);//anas

    if(!empty($request->docOld)){
      $path = public_path($destinationPath);
      $file = $path.$upload_surat_izin;
      $cekFile = file_exists($file);
      // return $file;
      if($cekFile){
        @unlink($file);
        $permohonan -> upload_surat_izin = null; 
        $permohonan -> save();
      }
    }
    $upload_surat_izin = $request->file('upload_surat_izin');
      
    $upload = Auth::User()->id . uniqid().time().'.'.$upload_surat_izin->getClientOriginalExtension();

    $permohonan -> upload_surat_izin = $upload; 
    $permohonan -> save();

    if($permohonan){
      // Move Uploaded upload_proposal_penelitian
      $upload_surat_izin->move($destinationPath,$upload);
      // return ['status' => 'success'];
      Session::flash('pesan','Surat Izin Berhasil Diupload.');
      return Redirect::route('data_pengajuan');
    }
  }

  public function hapusSuratIzin(Request $request)//anas
  {
    $item_permohonan = Permohonan::where('id_permohonan',$request->id_permohonan)->first();
    $surat_izin = $item_permohonan->upload_surat_izin;

    if ($surat_izin) {
      $path = public_path('uploads/file_upload_persyaratan/');
      $file = $path.$surat_izin;
      $cekFile = file_exists($file);
      if($cekFile){
          unlink($file);
          $item_permohonan->upload_surat_izin = null;
          $item_permohonan->save();
          return ['status' => 'success','message'=>'Berhasil Hapus Surat Izin'];
      }
    }
    
    return ['status' => 'failed','message'=>'Gagal Hapus Surat Izin'];
  }

  public function approvePerFile(Request $request)//anas
  {
    // return $request->all();
    $id_item_permohonan = $request->id_item_permohonan;
    $doc_status = $request->doc_status;
    $catatan = $request->catatan;
    
    $File = ItemPermohonan::find($id_item_permohonan);
    $id_permohonan = $File->permohonan_id;
    
    $File->doc_status = $doc_status;
    if (Auth::getUser()->level == 1) {
      $File->catatan_admin = $catatan;
      $File->acc_admin = $doc_status;
      $File->tgl_acc_admin = date('Y-m-d');
      
      // Langsung Dibuatkan Surat Start
      $permohonan = Permohonan::find($id_permohonan);
      $permohonan->tgl_ambil = date('Y-m-d',strtotime('+7 day',strtotime(date('Y-m-d'))));
      $permohonan->save();
      // Langsung Dibuatkan Surat End
    }elseif (Auth::getUser()->level == 2) {
      $File->catatan_kasi = $catatan;
      $File->acc_kasi = $doc_status;
      $File->tgl_acc_kasi = date('Y-m-d');
    }else {
    }
    $File->save();

    if($File){

      $users = Permohonan::join('profiles', 'permohonan.users_id', '=', 'profiles.users_id')
      ->where('permohonan.id_permohonan', $id_permohonan)->first();

      $tolak = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->where('doc_status',  'Tolak')->get();

      if(count($tolak) > 0){
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->status = 'Tolak';
        $permohonan->save();
        // $tolak_tempat = VerifikasiTempatPenelitian::where('permohonan_id',$users->id_permohonan)->update(['status_verifikasi' => 'Menunggu']);
        $data = [
          'batas_waktu' => date('d F Y', strtotime("+3 day", strtotime($users->created_at))),
        ];
        $sendMail = Mail::send('emails.notifTolak', $data, function ($mail) use ($users) {

          $mail->to($users->email);
          $mail->subject('Maaf! Pengajuan anda Ditolak');

        });
      }else{
        $jumlah_syarat = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->get();
        $permohonan = Permohonan::find($id_permohonan);

          if (Auth::getUser()->level == 1) {
            $terima = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->whereRaw("acc_admin='Terima'")->get();
            if(count($terima)==count($jumlah_syarat)){
              $status_permohonan = 'Menunggu Kasi';
              // $status_permohonan = 'Terima Admin';
              if ($permohonan->estimasi_waktu == '') {
                $permohonan->estimasi_waktu = date('Y-m-d',strtotime('+14 days',strtotime(date('Y-m-d'))));
              }

              $data = [
                'batas_waktu' => date('d F Y', strtotime("+3 day", strtotime($users->created_at))),
              ];
              $sendMail = Mail::send('emails.notifRev', $data, function ($mail) use ($users) {

                $mail->to($users->email);
                $mail->subject('Selamat! Pengajuan anda diterima');

              });
            }
          }elseif (Auth::getUser()->level == 2) {
            $terima = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->whereRaw("acc_kasi='Terima'")->get();
            if(count($terima)==count($jumlah_syarat)){
              $status_permohonan = 'Terima'; 
              $data = [
                'nama_pemohon' => $users,
                // 'file_nama' => ItemPermohonan::join('jenis_file_pendukung','doc_pendukung.jenis_file', '=', 'jenis_file_pendukung.id_jenis_file')->where('permohonan_id',$users->id_permohonan)->orderBy('jenis_file','Asc')->get(),
                'file_nama' => ItemPermohonan::
                // join('jenis_file_pendukung','doc_pendukung.jenis_file', '=', 'jenis_file_pendukung.id_jenis_file')
                                where('permohonan_id',$users->id_permohonan)
                                ->get(),
              ];
              // return $data;
              $sendMail = Mail::send('emails.berkas_user', $data, function ($mail) use ($users) {
                $mail->to('dinkessidoarjo46@gmail.com');
                // $mail->to('silvyaanggraini99@gmail.com');
                $mail->subject('Berikut berkas dari pemohon');
              });
            }         
          }elseif (Auth::getUser()->level == 4) {
            $terima = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->whereRaw("acc_kabid='Terima'")->get();
            if(count($terima)==count($jumlah_syarat)){
              $status_permohonan = 'Menunggu Kadin';
            }
          }else {
            $terima = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->whereRaw("acc_kadin='Terima'")->get();
            if(count($terima)==count($jumlah_syarat)){
              $status_permohonan = 'Terima';
            }
          }
        if(isset($status_permohonan)){
          $permohonan->status = $status_permohonan;
        }
        $permohonan->save();                

        $id_permohonan = $File -> permohonan_id;
        // return $id_permohonan;
        return ['status' => 'success','id_item_permohonan'=>$id_item_permohonan,'file_doc'=>$File];
      }

    }

    return ['status' => 'success','id_item_permohonan'=>$id_item_permohonan,'file_doc'=>$File];
  }

  public function approveFile(Request $request)
  {
    // return $request->all();

    $id_item_permohonan = $request->id_item_permohonan;
    $doc_status = $request->doc_status;
    $catatan = $request->catatan;

    $File = ItemPermohonan::find($id_item_permohonan);
    $id_permohonan = $File->permohonan_id;

    $File->doc_status = $doc_status;
    $File->catatan = $catatan;
    if (Auth::getUser()->level == 1) {
      $File->acc_admin = $doc_status;
      $File->tgl_acc_admin = date('Y-m-d');
      // Langsung Dibuatkan Surat Start
      $permohonan = Permohonan::find($id_permohonan);
      $permohonan->tgl_ambil = date('Y-m-d',strtotime('+1 day',strtotime(date('Y-m-d'))));
      $permohonan->save();
      // Langsung Dibuatkan Surat End
    }elseif (Auth::getUser()->level == 2) {
      $File->acc_kasi = $doc_status;
      $File->tgl_acc_kasi = date('Y-m-d');
    }elseif (Auth::getUser()->level == 4) {
      $File->acc_kabid = $doc_status;
      $File->tgl_acc_kabid = date('Y-m-d');
    }else {
      $File->acc_kadin = $doc_status;
      $File->tgl_acc_kadin = date('Y-m-d');
    }
    $File->save();

    if($File){
      $users = Permohonan::join('profiles', 'permohonan.users_id', '=', 'profiles.users_id')
      ->where('permohonan.id_permohonan', $id_permohonan)->first();
      // return $users;

      $tolak = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->where('doc_status',  'Tolak')->get();

      if(count($tolak) > 0){
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->status = 'Tolak';
        $permohonan->save();
        // $tolak_tempat = VerifikasiTempatPenelitian::where('permohonan_id',$users->id_permohonan)->update(['status_verifikasi' => 'Menunggu']);
        $data = [
          'batas_waktu' => date('d F Y', strtotime("+3 day", strtotime($users->created_at))),
        ];
        $sendMail = Mail::send('emails.notifTolak', $data, function ($mail) use ($users) {

          $mail->to($users->email);
          $mail->subject('Maaf! Pengajuan anda Ditolak');

        });
      }else{
        $jumlah_syarat = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->get();
        $permohonan = Permohonan::find($id_permohonan);

          if (Auth::getUser()->level == 1) {
            $terima = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->whereRaw("acc_admin='Terima'")->get();
            if(count($terima)==count($jumlah_syarat)){
              $status_permohonan = 'Menunggu Kasi';
              // $status_permohonan = 'Terima Admin';
              if ($permohonan->estimasi_waktu == '') {
                $permohonan->estimasi_waktu = date('Y-m-d',strtotime('+14 days',strtotime(date('Y-m-d'))));
              }

              $data = [
                'batas_waktu' => date('d F Y', strtotime("+3 day", strtotime($users->created_at))),
              ];
              $sendMail = Mail::send('emails.notifRev', $data, function ($mail) use ($users) {

                $mail->to($users->email);
                $mail->subject('Selamat! Pengajuan anda diterima');

              });
            }
          }elseif (Auth::getUser()->level == 2) {
            $terima = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->whereRaw("acc_kasi='Terima'")->get();
            if(count($terima)==count($jumlah_syarat)){
              $status_permohonan = 'Terima'; 
              $data = [
                'nama_pemohon' => $users,
                // 'file_nama' => ItemPermohonan::join('jenis_file_pendukung','doc_pendukung.jenis_file', '=', 'jenis_file_pendukung.id_jenis_file')->where('permohonan_id',$users->id_permohonan)->orderBy('jenis_file','Asc')->get(),
                'file_nama' => ItemPermohonan::
                // join('jenis_file_pendukung','doc_pendukung.jenis_file', '=', 'jenis_file_pendukung.id_jenis_file')
                                where('permohonan_id',$users->id_permohonan)
                                ->get(),
              ];
              // return $data;
              $sendMail = Mail::send('emails.berkas_user', $data, function ($mail) use ($users) {
                $mail->to('dinkessidoarjo46@gmail.com');
                // $mail->to('silvyaanggraini99@gmail.com');
                $mail->subject('Berikut berkas dari pemohon');
              });
            }         
          }elseif (Auth::getUser()->level == 4) {
            $terima = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->whereRaw("acc_kabid='Terima'")->get();
            if(count($terima)==count($jumlah_syarat)){
              $status_permohonan = 'Menunggu Kadin';
            }
          }else {
            $terima = ItemPermohonan::where('permohonan_id',$users->id_permohonan)->whereRaw("acc_kadin='Terima'")->get();
            if(count($terima)==count($jumlah_syarat)){
              $status_permohonan = 'Terima';
            }
          }
        if(isset($status_permohonan)){
          $permohonan->status = $status_permohonan;
        }
        $permohonan->save();                

        $id_permohonan = $File -> permohonan_id;
        // return $id_permohonan;
        return ['status' => 'success','id_item_permohonan'=>$id_item_permohonan,'file_doc'=>$File];        
      }         
    }

    return ['status' => 'success','id_item_permohonan'=>$id_item_permohonan,'file_doc'=>$File];
  }

  public function terima_pengajuan(Request $request)
  {
    $terima = Permohonan::where("id_permohonan",$request->id)->update(['status' => 'Menunggu Kasi']);

    if($terima){
      $permohonan = Permohonan::join('profiles', 'permohonan.users_id', '=', 'profiles.users_id')
      ->where('permohonan.id_permohonan', $request->id)->first();
      $data = [
      'batas_waktu' => date('d F Y', strtotime("+3 day", strtotime($permohonan->created_at))),
      ];
      $sendMail = Mail::send('emails.notifAcc', $data, function ($mail) use ($permohonan) {
        // tujuan
        $mail->to($permohonan->email);
        // subjeks
        $mail->subject('Selamat! Judul Pengajuan anda diterima');
      });
      return ['status' => 'success'];
    }else{
      return ['status'=>'error'];
    }
  }

  public function tolak_pengajuan(Request $request)
  {
    $tolak = Permohonan::where("id_permohonan",$request->id)->update(['status' => 'tolak']);

    if($tolak){
      $permohonan = Permohonan::join('profiles', 'permohonan.users_id', '=', 'profiles.users_id')
      ->where('permohonan.id_permohonan', $request->id)->first();
      $data = [
      'batas_waktu' => date('d F Y', strtotime("+3 day", strtotime($permohonan->created_at))),
      ];
      $sendMail = Mail::send('emails.notifTolak', $data, function ($mail) use ($permohonan) {
        // tujuan
        $mail->to($permohonan->email);
        // subjeks
        $mail->subject('Maaf! Judul Pengajuan anda tidak diterima');
      });
      return ['status' => 'success'];
    }else{
      return ['status'=>'error'];
    }
  }

  public function send_notif(Request $request)
  {
    $acc = Permohonan::where("id_permohonan",$request->id)->update(['surat_ijin' => 'belum di ambil']);

    if($acc){
      $permohonan = Permohonan::join('profiles', 'permohonan.users_id', '=', 'profiles.users_id')
      ->where('permohonan.id_permohonan', $request->id)->first();
      $data = [
      'batas_waktu' => date('d F Y', strtotime("+3 day", strtotime($permohonan->created_at))),
      ];
      $sendMail = Mail::send('emails.notifIjin', $data, function ($mail) use ($permohonan) {

        $mail->to($permohonan->email);
        $mail->subject('Surat Ijin Penelitian');
      });
      return ['status' => 'success'];
    }else{
      return ['status'=>'error'];
    }
  }

  public function delete_permohonan(Request $request)
  {
    $id = $request->id;
    $do_delete = Permohonan::find($id);
    $do_delete_item = ItemPermohonan::where('permohonan_id',$id)->get();
    
    if(!empty($do_delete)){

      if(count($do_delete_item)>0){
        foreach ($do_delete_item as $delete_item) {
        $destinationPath = 'uploads/file_upload_persyaratan';
        File::delete($destinationPath.'/'.$delete_item->file_doc);      
        $delete_item->delete();
        }
      }

      $do_delete->delete();
      return ['status' => 'success'];
    }else{
      return ['status'=>'error'];
    }
  }

  public function notifikasi_submit()
  {
    $submit = Permohonan::select('email', 'judul_penelitian', 'estimasi_waktu')
    ->where("permohonan.status", 'terima')->where('surat_ijin', 'sudah')
    ->where('estimasi_waktu', '<=', date('Y-m-d', strtotime('+7 days')))
    ->join('profiles', 'permohonan.users_id', '=', 'profiles.users_id')
    ->get();

    foreach ($submit as $value)
    {
      $e = $value->email;
      $data = [
      'judul_penelitian'  => $value->judul_penelitian,
      'estimasi_waktu'	=> $value->estimasi_waktu
      ];
      Mail::send('emails.notif_submit', $data, function ($mail) use ($e) {
        $mail->to($e);
        $mail->subject('Segera Upload Hasil Penelitian Anda!');
      });
    }
  }

  public function is_banned()
  {
    $submit = Permohonan::select('profiles.email', 'profiles.first_name', 'profiles.middle_name', 'last_name')
    ->where("permohonan.status", 'terima')
    ->where('permohonan.surat_ijin', 'sudah')
    ->where('estimasi_waktu', date('Y-m-d', strtotime('-1 day')))
    ->where('users.is_banned', 0)
    ->join('profiles', 'permohonan.users_id', '=', 'profiles.users_id')
    ->join('users', 'users.id', '=', 'permohonan.users_id')
    ->get();
    // return $submit;

    foreach ($submit as $value)
    {
      $email = $value->email;

      $data = [
      'first_name'  		=> $value->first_name,
      'middle_name'		=> $value->middle_name,
      'last_name'			=> $value->last_name,
      ];

      $update = User::where("email",$email)->update(['is_banned' => 1]);

      if ($update) {

        Mail::send('emails.notif_banned', $data, function ($mail) use ($email) {

          $mail->to($email);
          $mail->subject('Akun Dinonaktifkan');

        });
      }
    }
  }

  function modal_surat(Request $request){
    $id_permohonan = $request->id;

    $permohonan = Permohonan::join('profiles as p','p.users_id','permohonan.users_id')->find($id_permohonan);
    $lembar_konfirmasi = Lembar_Konfir::orderBy('keterangan')->get();
    $tempatPenelitian = Tempat_Penelitian::orderBy('id_tempat_penelitian')->get();

    $data = [
      'permohonan'=>$permohonan,
      'lmb'=>$lembar_konfirmasi,
      'tmpt'=>$tempatPenelitian,
    ];

    $content = view('owner.pengajuan.modal_surat',$data)->render();

    return ['status'=>'success','content'=>$content];
  }

  function modal_upload_surat_izin(Request $request){
    $id_permohonan = $request -> id_permohonan;
    $get = ItemPermohonan::where('permohonan_id', $id_permohonan)->first();
    $id_item_permohonan = $get -> id_item_permohonan;
    $menu = MenuOwner::menuActive('mn_data_pengajuan');
    $data = [
    'menus'=>Menu::orderBy('id_menu','desc')->get(),
    'title'		=>'Details Data Pengajuan',
    'pengajuan'	=> Permohonan::where('permohonan.id_permohonan', $id_permohonan)
                              -> join('item_permohonan as item', 'item.permohonan_id', 'permohonan.id_permohonan')
                              // ->join('doc_pendukung', 'permohonan.id_permohonan', '=', 'doc_pendukung.permohonan_id')
                              // ->join('jenis_file_pendukung', 'doc_pendukung.jenis_file', '=' ,'jenis_file_pendukung.id_jenis_file')
                              ->first(),
      'id_item_permohonan'=>$id_item_permohonan,
      'id_permohonan' => $id_permohonan
    ];
    // return $data;
    $data = array_merge($data,$menu);
    $content = view('owner.pengajuan.modal_upload_surat_izin',$data)->render();
    return ['content' => $content, 'status' => 'success'];
  }

  #batal terima
  public function batal_pengajuan(Request $request)
  {    
    $terima = Permohonan::where("id_permohonan",$request->id_permohonan)->update(['status' => 'Menunggu Admin']);
    if($terima){
      $item_permohonan = ItemPermohonan::where('permohonan_id',$request->id_permohonan)
      ->update([
        'doc_status' => 'Pending',
        'acc_admin' => 'Menunggu'
        ])
      ;
      
      return ['status' => 'success'];
    }else{
      return ['status'=>'error'];
    }
  }

}

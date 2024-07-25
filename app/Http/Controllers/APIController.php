<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Permohonan;
use App\Lembar_Konfir;
use App\ItemPermohonan;
use App\Tempat_Penelitian;
use App\VerifikasiTempatPenelitian;
use App\Http\Libraries\Formatter;
use Illuminate\Support\Facades\Mail;

class APIController extends Controller
{
  function get_tempat(Request $request){

    // return $request->all();
    //silfi

    $value_tempat = $request->value_tempat;
    $value = $request->value;

    if ($value_tempat == 1) {
        $tmp = Tempat_Penelitian::select('nama_tempat','id_tempat_penelitian')->where('nama_tempat','like','%'.$value.'%')->where('kategori','External')->get();      
    }else{
       $tmp = Tempat_Penelitian::select('nama_tempat','id_tempat_penelitian')->where('nama_tempat','like','%'.$value.'%')->where('kategori','Internal')->get();      
    }

    //

    $unit = [];
    // $unit2 = [];
    if(!empty($tmp)){
      foreach ($tmp as $a) {
        array_push($unit,$a->id_tempat_penelitian.'__'.$a->nama_tempat);
        // array_push($unit2,$a->id_tempat_penelitian.'__'.$a->nama_tempat);
      }
    }

    $unit = array_unique($unit);
    $unit = array_values($unit);

    // $unit2 = array_unique($unit2);
    // $unit2 = array_values($unit2);

    if(count($unit)!=0){
      return ['status'=>'success','tempat_penelitian'=>$unit];/*,'tempat_penelitian2'=>$unit2*/
    }
    return ['status'=>'error','tempat_penelitian'=>$unit];/*,'tempat_penelitian2'=>$unit2*/
  }

  function get_tempat_b(Request $request){

    // return $request->all();
    //silfi

    $value_tempat = $request->value_tempat;
    $value = $request->value;

    $tmp = Tempat_Penelitian::select('nama_tempat','id_tempat_penelitian')->where('nama_tempat','like','%'.$value.'%')->get();
    //

    $unit = [];
    // $unit2 = [];
    if(!empty($tmp)){
      foreach ($tmp as $a) {
        array_push($unit,$a->id_tempat_penelitian.'__'.$a->nama_tempat);
        // array_push($unit2,$a->id_tempat_penelitian.'__'.$a->nama_tempat);
      }
    }

    $unit = array_unique($unit);
    $unit = array_values($unit);

    // $unit2 = array_unique($unit2);
    // $unit2 = array_values($unit2);

    if(count($unit)!=0){
      return ['status'=>'success','tempat_penelitian'=>$unit];/*,'tempat_penelitian2'=>$unit2*/
    }
    return ['status'=>'error','tempat_penelitian'=>$unit];/*,'tempat_penelitian2'=>$unit2*/
  }

  function get_unit(Request $request){
    $value = $request->value;

    $tmp = Tempat_Penelitian::select('nama_tempat')
                            ->where('kategori', 'Internal')
                            ->where('nama_tempat','like','%'.$value.'%')->limit(15)->get();

    $unit = [];
    if(!empty($tmp)){
      foreach ($tmp as $a) {
        array_push($unit,$a->nama_tempat);
      }
    }

    $unit = array_unique($unit);
    $unit = array_values($unit);

    if(count($unit)!=0){
      return ['status'=>'success','unit_kerja'=>$unit];
    }
    return ['status'=>'error','unit_kerja'=>$unit];
  }

  function cetak_surat(Request $request){
    $id_permohonan = $request->permohonan;
    $kategori = $request->kategori;

    $pakai_surat = $this->generate_surat($id_permohonan,$kategori);

    $data = [
      'data'=>$pakai_surat,
    ];

    return view('owner.cetak.index',$data);
  }

  function view_surat(Request $request){
    $id_permohonan = $request->permohonan;
    $kategori = $request->kategori;

    $pakai_surat = $this->generate_surat($id_permohonan,$kategori);
    
    // return view('owner.cetak.view');
    $data = [
      'data'=>$pakai_surat,
    ];

    $content = view('owner.cetak.view',$data)->render();
    return ['status'=>'success','content'=>$content];
  }

  function generate_surat($id_permohonan,$kategori){
    // return $kategori;
    $get_surat = Lembar_Konfir::where('keterangan',$kategori)->first();
    // $get_surat = Lembar_Konfir::find($kategori);    

    $permohonan = Permohonan::leftjoin('profiles as p','p.users_id','permohonan.users_id')    
    ->where('id_permohonan',$id_permohonan)->first();
    $surat = $get_surat->form_konfirmasi;

    $tempat_penelitian = VerifikasiTempatPenelitian::select('nama_tempat_penelitian')
    ->where('permohonan_id',$permohonan->id_permohonan)->get();

    $nama_tengah = ($permohonan->middle_name!='') ? $permohonan->middle_name.' ' : ' ';
    $nama = $permohonan->first_name.' '.$nama_tengah.$permohonan->last_name;
    // return $permohonan;
    $pakai_surat = $surat;
    $instansi_asal = $permohonan->unit_instansi ? $permohonan->unit_instansi : $permohonan->unit_kerja;
    $kepada = '';
    if($tempat_penelitian){ 
      
      if(count($tempat_penelitian)>1){
        $no = 1;        
        for ($i=0; $i < count($tempat_penelitian); $i++) {
          $kepada .= $no.'. '.$tempat_penelitian[$i]->nama_tempat_penelitian.'<br>';
          $no++;
        }
      }else{        
        if(count($tempat_penelitian)>0){
          $kepada = $tempat_penelitian[0]->nama_tempat_penelitian;
        }else{
          $kepada = '-';
        }
      }
    }

    // return $kepada;
    $pakai_surat = str_replace('[[instansi-tujuan]]',$kepada,$pakai_surat);
    $pakai_surat = str_replace('[[header]]',url('/')."/images/sidoarjo-black-white-seek-logo.png",$pakai_surat);
    $pakai_surat = str_replace('[[footer]]',url('/')."/images/bsre-logo.png",$pakai_surat);
    $pakai_surat = str_replace('[[tahun-pengajuan]]',date('Y',strtotime($permohonan->tgl_pengajuan)),$pakai_surat);
    $pakai_surat = str_replace('[[nama]]',$nama,$pakai_surat);
    $pakai_surat = str_replace('[[instansi-asal]]',$instansi_asal,$pakai_surat);
    $kategori = 'NIK';
    if($permohonan->category=='mhs'){
      $kategori = 'NIM';
    }elseif($permohonan->category=='pns'){
      $kategori = 'NIP';
    }elseif($permohonan->category=='dosen'){
      $kategori = 'NIP/NIK';
    }
    $pakai_surat = str_replace('[[no-identitas]]',$kategori,$pakai_surat);
    $pakai_surat = str_replace('[[digit-identitas]]',$permohonan->no_identitas,$pakai_surat);
    $wkt_cetak = Formatter::tanggal_indo($permohonan->tgl_pengajuan);
    $wkt_cetak_pakai = explode(" ",$wkt_cetak);
    $pakai_surat = str_replace('[[waktu-cetak]]','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$wkt_cetak_pakai[1].' '.$wkt_cetak_pakai[2],$pakai_surat);
    $pakai_surat = str_replace('[[waktu-penelitian]]',Formatter::tanggal_indo($permohonan->tgl_awal).' s.d. '.Formatter::tanggal_indo($permohonan->tgl_akhir),$pakai_surat);
    $pakai_surat = str_replace('[[judul-penelitian]]',$permohonan->judul_penelitian,$pakai_surat);
    $pakai_surat = str_replace('[[pendidikan]]',$permohonan->pendidikan_terakhir,$pakai_surat);
    $pakai_surat = str_replace('[[no-surat-pengantar]]',$permohonan->nomor_surat_pimpinan,$pakai_surat);
    $pakai_surat = str_replace('[[tanggal-pengantar]]',Formatter::tanggal_indo($permohonan->tgl_surat_pimpinan),$pakai_surat);
    $pakai_surat = str_replace('[[jabatan-pj]]',$permohonan->jabatan_pj,$pakai_surat);
    $pakai_surat = str_replace('[[no-bakesbangpol]]',$permohonan->nomor_surat_rekom,$pakai_surat);    
    $pakai_surat = str_replace('[[tanggal-bakesbangpol]]',Formatter::tanggal_indo($permohonan->tgl_surat_rekom),$pakai_surat);    

    return $pakai_surat;
  }

  function konfirmasi_pengambilan(Request $request){
    $id_permohonan = $request->id;

    $permohonan = Permohonan::find($id_permohonan);

    $profile = Profile::where('users_id',$permohonan->users_id)->first();

    $permohonan->tgl_ambil = date('Y-m-d',strtotime('+1 day',strtotime(date('Y-m-d'))));
    $permohonan->save();

    if(!empty($profile)){
      if($profile->email!=''){
        $data = [
        'batas_waktu' => date('d F Y', strtotime("+3 day", strtotime($profile->created_at))),
        'tanggal'=> date('Y-m-d',strtotime('+1 day',strtotime(date('Y-m-d')))),
        'id'=>$id_permohonan,
        ];
        $sendMail = Mail::send('emails.notifSurat', $data, function ($mail) use ($profile) {

          $mail->to($profile->email);
          $mail->subject('Selamat! Surat bisa diambil');

        });
      }
    }

    if($permohonan){
      return ['status'=>'success'];
    }
    return ['status'=>'error'];
  }

  function cetak_konfirmasi(Request $request){
    $id_permohonan = $request->id;
    $permohonan = Permohonan::find($id_permohonan);
    return view('emails.cetak_konfirmasi',['tanggal'=>Formatter::tanggal_indo($permohonan->tgl_ambil)]);
  }
}

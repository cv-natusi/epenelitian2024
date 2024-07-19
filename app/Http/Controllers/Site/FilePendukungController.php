<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use App\User;
use App\Jenis_File_Pendukung;
use App\Doc_Pendukung;
use App\Permohonan;
use App\ItemPermohonan;
use App\Jenis_Penelitian;
use Validator;
use App\bahasa;
use App\VerifikasiTempatPenelitian;
use Illuminate\Support\Facades\File; 
use Auth,Redirect,Hash,Session,DB;


class FilePendukungController extends Controller
{

    public function form_permohonan(Request $request)
    {
        $get = User::join('profiles', 'profiles.users_id', 'users.id')->find(Auth::User()->id);
        $data = [
          'id_menu' => '9',
          'category' => $get->category,
          'jenis_penelitian' => Jenis_Penelitian::all(),
          'jenis_file_pendukung' => Jenis_File_Pendukung::whereNull('is_statis')->get(),
          'jenis_file_pendukung_statis' => Jenis_File_Pendukung::whereNotNull('is_statis')->get()
          ];
        return view('userhome.form_permohonan',$data);
    }

    public function store_permohonan_b(Request $request)
    {
      return $request->all();
      if(empty($request -> id_permohonan)){
        $validator=Validator::make($request->all(),[
          'judul_penelitian'      => 'required',
          'tgl_surat_pimpinan'    => 'required',
          'nomor_surat_pimpinan'  => 'required',
          'tgl_surat_rekom'       => 'required',
          'nomor_surat_rekom'     => 'required',
          'pendidikan'            => 'required',
          'tgl_awal'              => 'required',
          'tgl_akhir'             => 'required',
        ]);

        $saveprh = new Permohonan;
        $saveprh->judul_penelitian = $request->judul_penelitian;
        $saveprh->users_id = Auth::User()->id;
        $saveprh->status = "terima";
        $saveprh->estimasi_waktu = date('Y-m-d');
        $saveprh->tgl_awal = date('Y-m-d',strtotime($request->tgl_awal));
        $saveprh->tgl_akhir = date('Y-m-d',strtotime($request->tgl_akhir));
        $saveprh->tgl_pengajuan = date('Y-m-d');
        $saveprh->tgl_ambil = date('Y-m-d');

        $saveprh->tgl_surat_pimpinan  = date('Y-m-d',strtotime($request->tgl_surat_pimpinan));
        $saveprh->nomor_surat_pimpinan = $request->nomor_surat_pimpinan;
        $saveprh->tgl_surat_rekom = date('Y-m-d',strtotime($request->tgl_surat_rekom));
        $saveprh->nomor_surat_rekom = $request->nomor_surat_rekom;
        $saveprh->pendidikan = $request->pendidikan;
        $saveprh->save();

        if ($saveprh) {
          $item_permohonan = new ItemPermohonan();
          $item_permohonan->permohonan_id = $saveprh->id_permohonan;
          $item_permohonan->catatan = "-";
          $item_permohonan->doc_status = "Terima";
          $item_permohonan->acc_admin = "Terima";
          $item_permohonan->acc_kasi = "Terima";
          $item_permohonan->tgl_acc_admin = date('Y-m-d');
          $item_permohonan->tgl_acc_kasi = date('Y-m-d');          
          $item_permohonan->save();

          $getID = User::where('id', Auth::User()->id)->first();
          $getPrh = Permohonan::orderBy('id_permohonan', 'desc')->first();
          $unit_kerja = $request->unit_kerja_b;
          $arr = array();

          if ($unit_kerja != '') {
            $wadah = explode('|',$unit_kerja);
            for ($i=0; $i < count($wadah); $i++) { 
              $cell = explode('__',$wadah[$i]);
              array_push($arr,$cell[0]);
              
              $savevprh = new VerifikasiTempatPenelitian;
              $savevprh->permohonan_id = $getPrh->id_permohonan;
              $savevprh->tempat_penelitian_id = $cell[0];
              $savevprh->nama_tempat_penelitian = $cell[1];
              $savevprh->status_verifikasi = NULL;
              $savevprh->user_id = $getID->id;
              $savevprh->save();

            }
          }
        }
      }
    return Redirect::route('userhome');
  }

    public function store_permohonan_c(Request $request)
    {
      return $request->all();
      if(empty($request -> id_permohonan)){
        $validator=Validator::make($request->all(),[
          'judul_penelitian'      => 'required',
          'tgl_surat_pimpinan'    => 'required',
          'nomor_surat_pimpinan'  => 'required',
          'tgl_surat_rekom'       => 'required',
          'nomor_surat_rekom'     => 'required',
          'pendidikan'            => 'required',
          'tgl_awal'              => 'required',
          'tgl_akhir'             => 'required',
        ]);

        $saveprh = new Permohonan;
        $saveprh->judul_penelitian = $request->judul_penelitian;
        $saveprh->jenis_penelitian_id = $request->jenis_penelitian_id;
        $saveprh->tgl_pengajuan = date('Y-m-d');
        $saveprh->tgl_awal = date('Y-m-d',strtotime($request->tgl_awal));
        $saveprh->tgl_akhir = date('Y-m-d',strtotime($request->tgl_akhir));
        $saveprh->users_id = Auth::User()->id;
        $saveprh->status = "Menunggu Admin";

        $saveprh->tgl_surat_pimpinan  = $request->tgl_surat_pimpinan;
        $saveprh->nomor_surat_pimpinan = $request->nomor_surat_pimpinan;
        $saveprh->tgl_surat_rekom = $request->tgl_surat_rekom;
        $saveprh->nomor_surat_rekom = $request->nomor_surat_rekom;
        $saveprh->pendidikan = $request->pendidikan;

        $saveprh->save();
          
        if ($saveprh) {
          // Khafid
          // Create Item Start

          $upload_proposal_penelitian = $request->file('upload_proposal_penelitian');
          $upload_surat_pengantar = $request->file('upload_surat_pengantar');
          $upload_surat_rekomendasi = $request->file('upload_surat_rekomendasi');
          $upload_surat_pernyataan = $request->file('upload_surat_pernyataan');
          $upload_surat_kesediaan = $request->file('upload_surat_kesediaan');
    
          // upload_proposal_penelitian Name
          // $upload_proposal_penelitian->getClientOriginalName();
          
          // Display upload_proposal_penelitian Extension
          // $upload_proposal_penelitian->getClientOriginalExtension();
    
          // Display upload_proposal_penelitian Real Path
          // $upload_proposal_penelitian->getRealPath();
    
          // Display upload_proposal_penelitian Size
          // $upload_proposal_penelitian->getSize();
    
          // Display upload_proposal_penelitian Mime Type
          // $upload_proposal_penelitian->getMimeType();
          
          $upload1 = Auth::User()->id . uniqid().time().'.'.$upload_proposal_penelitian->getClientOriginalExtension();
          $upload2 = Auth::User()->id . uniqid().time().'.'.$upload_surat_pengantar->getClientOriginalExtension();
          $upload3 = Auth::User()->id . uniqid().time().'.'.$upload_surat_rekomendasi->getClientOriginalExtension();
          $upload4 = Auth::User()->id . uniqid().time().'.'.$upload_surat_pernyataan->getClientOriginalExtension();
          $upload5 = Auth::User()->id . uniqid().time().'.'.$upload_surat_kesediaan->getClientOriginalExtension();

          $item_permohonan = new ItemPermohonan();
          $item_permohonan -> permohonan_id = $saveprh -> id_permohonan;
          $item_permohonan -> upload_proposal_penelitian = $upload1;
          $item_permohonan -> upload_surat_pengantar = $upload2;
          $item_permohonan -> upload_surat_rekomendasi = $upload3;
          $item_permohonan -> upload_surat_pernyataan = $upload4;
          $item_permohonan -> upload_surat_kesediaan = $upload5;
          $item_permohonan -> doc_status = "Menunggu";
          $item_permohonan -> acc_admin = "Menunggu";
          $item_permohonan -> acc_kasi = "Menunggu";
          $item_permohonan -> catatan = NULL;
          $item_permohonan -> save();

          if($item_permohonan){
            // Move Uploaded upload_proposal_penelitian
            $destinationPath = 'uploads/file_upload_persyaratan';
            $upload_proposal_penelitian->move($destinationPath,$upload1);
            $upload_surat_pengantar->move($destinationPath,$upload2);
            $upload_surat_rekomendasi->move($destinationPath,$upload3);
            $upload_surat_pernyataan->move($destinationPath,$upload4);
            $upload_surat_kesediaan->move($destinationPath,$upload5);
          }
          // Create Item End

          $getID = User::where('id', Auth::User()->id)->first();
          $getPrh = Permohonan::orderBy('id_permohonan', 'desc')->first();
          $unit_kerja = $request->unit_kerja;
          $arr = array();

          if ($unit_kerja != '') {
            $wadah = explode('|',$unit_kerja);

            for ($i=0; $i < count($wadah); $i++) { 
              $cell = explode('__',$wadah[$i]);
              array_push($arr,$cell[0]);
              
              $savevprh = new VerifikasiTempatPenelitian;
              $savevprh->permohonan_id = $getPrh->id_permohonan;
              $savevprh->tempat_penelitian_id = $cell[0];
              $savevprh->nama_tempat_penelitian = $cell[1];
              $savevprh->status_verifikasi = 'Menunggu';
              $savevprh->user_id = $getID->id;
              $savevprh->save();

            }
          }

        }       

        $masuk = $saveprh->save();
        if ($masuk) {
          Session::flash('pesan','Permohonan berhasil dibuat, tinggal menunggu persetujuan dari admin dinkes');
        }

        return Redirect::route('userhome');
      } else {
        // Khafid
        $permohonan = Permohonan::find($request->id_permohonan);
        $permohonan -> status = "Menunggu Admin";
        $permohonan -> save();
          
        if($permohonan){
          $destinationPath = 'uploads/file_upload_persyaratan';
          $item_permohonan = ItemPermohonan::where('permohonan_id',$request->id_permohonan)->first();
          // Delete Dulu File Lama
          File::delete($destinationPath.'/'.$item_permohonan->upload_proposal_penelitian, 
          $destinationPath.'/'.$item_permohonan->upload_surat_pengantar, 
          $destinationPath.'/'.$item_permohonan->upload_surat_rekomendasi, 
          $destinationPath.'/'.$item_permohonan->upload_surat_pernyataan, 
          $destinationPath.'/'.$item_permohonan->upload_surat_kesediaan);

          $upload_proposal_penelitian = $request->file('upload_proposal_penelitian');
          $upload_surat_pengantar = $request->file('upload_surat_pengantar');
          $upload_surat_rekomendasi = $request->file('upload_surat_rekomendasi');
          $upload_surat_pernyataan = $request->file('upload_surat_pernyataan');
          $upload_surat_kesediaan = $request->file('upload_surat_kesediaan');
            
          $upload1 = Auth::User()->id . uniqid().time().'.'.$upload_proposal_penelitian->getClientOriginalExtension();
          $upload2 = Auth::User()->id . uniqid().time().'.'.$upload_surat_pengantar->getClientOriginalExtension();
          $upload3 = Auth::User()->id . uniqid().time().'.'.$upload_surat_rekomendasi->getClientOriginalExtension();
          $upload4 = Auth::User()->id . uniqid().time().'.'.$upload_surat_pernyataan->getClientOriginalExtension();
          $upload5 = Auth::User()->id . uniqid().time().'.'.$upload_surat_kesediaan->getClientOriginalExtension();

          $item_permohonan -> upload_proposal_penelitian = $upload1;
          $item_permohonan -> upload_surat_pengantar = $upload2;
          $item_permohonan -> upload_surat_rekomendasi = $upload3;
          $item_permohonan -> upload_surat_pernyataan = $upload4;
          $item_permohonan -> upload_surat_kesediaan = $upload5;
          $item_permohonan -> doc_status = "Menunggu";
          $item_permohonan -> catatan = NULL;
          $item_permohonan -> acc_admin = "Menunggu";
          $item_permohonan -> tgl_acc_admin = NULL;
          $item_permohonan -> acc_kasi = "Menunggu";
          $item_permohonan -> tgl_acc_kasi = NULL;
          $item_permohonan -> save();
  
          if($item_permohonan){
            // Move Uploaded upload_proposal_penelitian

            $upload_proposal_penelitian->move($destinationPath,$upload1);
            $upload_surat_pengantar->move($destinationPath,$upload2);
            $upload_surat_rekomendasi->move($destinationPath,$upload3);
            $upload_surat_pernyataan->move($destinationPath,$upload4);
            $upload_surat_kesediaan->move($destinationPath,$upload5);
            Session::flash('pesan','Permohonan berhasil diperbaiki, tinggal menunggu persetujuan dari admin dinkes');
            return Redirect::route('userhome');
          }
        }

      }
    }
    // anas
    public function store_permohonan(Request $request)
    {
      // return $request->all();
      $validator=Validator::make($request->all(),[
          'judul_penelitian'      => 'required',
          'tgl_surat_pimpinan'    => 'required',
          'nomor_surat_pimpinan'  => 'required',
          'tgl_surat_rekom'       => 'required',
          'nomor_surat_rekom'     => 'required',
          'pendidikan'            => 'required',
          'tgl_awal'              => 'required',
          'tgl_akhir'             => 'required',        
      ]);
      if(!$validator->fails()){
        DB::beginTransaction();
        if($request->id_permohonan){
          $saveprh = Permohonan::where('id_permohonan',$request->id_permohonan)->first();
        }else{
          $saveprh = new Permohonan;
        }
        $saveprh->judul_penelitian = $request->judul_penelitian;
        $saveprh->jenis_penelitian_id = $request->jenis_penelitian_id;
        $saveprh->tgl_pengajuan = date('Y-m-d');
        $saveprh->tgl_awal = date('Y-m-d',strtotime($request->tgl_awal));
        $saveprh->tgl_akhir = date('Y-m-d',strtotime($request->tgl_akhir));
        $saveprh->users_id = Auth::User()->id;
        $saveprh->status = "Menunggu Admin";

        $saveprh->tgl_surat_pimpinan  = $request->tgl_surat_pimpinan;
        $saveprh->nomor_surat_pimpinan = $request->nomor_surat_pimpinan;
        $saveprh->tgl_surat_rekom = $request->tgl_surat_rekom;
        $saveprh->nomor_surat_rekom = $request->nomor_surat_rekom;
        $saveprh->pendidikan = $request->pendidikan;

        $save_saveprh = $saveprh->save();

        if ($save_saveprh) {
          $public_path = 'uploads/file_upload_persyaratan';
          $doc_pendukung = $request->upload_doc_pendukung;
          $doc_pendukung_count = $request->upload_doc_pendukung ? count($request->upload_doc_pendukung) : 0;
          $save_item_permohonan = null;
          if($doc_pendukung_count != 0){
            for($i=0; $i < $doc_pendukung_count; $i++){
              $nama_doc = Auth::User()->id . uniqid().time().'.'.$doc_pendukung[$i]->getClientOriginalExtension();
              $doc_pendukung[$i]->move(public_path($public_path), $nama_doc);
  
              if($request->id_item_permohonan){
                $item_permohonan = ItemPermohonan::where('id_item_permohonan',$request->id_item_permohonan[$i])->first();
              }else{
                $item_permohonan = new ItemPermohonan();
              }
  
              $item_permohonan->permohonan_id = $saveprh ->id_permohonan;
    
              $item_permohonan->jenis_file_id = $request->id_jenis_file[$i];
              $item_permohonan->file_doc = $nama_doc;
              $item_permohonan->doc_status = "Menunggu";
              $item_permohonan->acc_admin = "Menunggu";
              $item_permohonan->acc_kasi = "Menunggu";
              $save_item_permohonan=$item_permohonan->save();
  
            }
          }

          $doc_pendukung_statis = $request->upload_doc_pendukung_statis;
          $doc_pendukung_statis_count = $request->upload_doc_pendukung_statis ? count($request->upload_doc_pendukung_statis) : 0;
          $save_item_permohonan_statis = null;
          if($doc_pendukung_statis_count != 0){
            for($i=0; $i < $doc_pendukung_statis_count; $i++){
              $nama_doc_statis = Auth::User()->id . uniqid().time().'.'.$doc_pendukung_statis[$i]->getClientOriginalExtension();
              $doc_pendukung_statis[$i]->move(public_path($public_path), $nama_doc_statis);

              if($request->id_item_permohonan_statis){
                $item_permohonan_statis = ItemPermohonan::where('id_item_permohonan',$request->id_item_permohonan_statis[$i])->first();
              }else{
                $item_permohonan_statis = new ItemPermohonan();
              }

              $item_permohonan_statis->permohonan_id = $saveprh->id_permohonan;
    
              $item_permohonan_statis->jenis_file_id = $request->id_jenis_file_statis[$i];
              $item_permohonan_statis->file_doc = $nama_doc_statis;
              $item_permohonan_statis->doc_status = "Menunggu";
              $item_permohonan_statis->acc_admin = "Menunggu";
              $item_permohonan_statis->acc_kasi = "Menunggu";
              $save_item_permohonan_statis=$item_permohonan_statis->save();
              
            }
          }

          $getID = User::where('id', Auth::User()->id)->first();
          $getPrh = Permohonan::orderBy('id_permohonan', 'desc')->first();
          $unit_kerja = $request->unit_kerja;
          $arr = array();

          if ($unit_kerja != '') {
            $wadah = explode('|',$unit_kerja);

            for ($i=0; $i < count($wadah); $i++) { 
              $cell = explode('__',$wadah[$i]);
              array_push($arr,$cell[0]);
              
              $savevprh = new VerifikasiTempatPenelitian;
              $savevprh->permohonan_id = $getPrh->id_permohonan;
              $savevprh->tempat_penelitian_id = $cell[0];
              $savevprh->nama_tempat_penelitian = $cell[1];
              $savevprh->status_verifikasi = 'Menunggu';
              $savevprh->user_id = $getID->id;
              $save_savevprh=$savevprh->save();

            }
          }

          // $masuk = $saveprh->save();
          if ($save_item_permohonan || $save_item_permohonan_statis) {
            DB::commit();
            Session::flash('pesan','Permohonan berhasil dibuat, tinggal menunggu persetujuan dari admin dinkes');
          }else{
            DB::roolback();
            Session::flash('pesan','Permohonan gagal dibuat','kesalahan sistem');
          }

          return Redirect::route('userhome');
        }
      }else{
        Session::flash('pesan','Permohonan gagal dibuat','periksa kembali file yg diupload');
        
        return Redirect::back();
      }
    }
    //end anas
    
    public function view(Request $request)
    {
        $data = [
            'id_menu' => '9',
            'permohonan' => Permohonan::where('users_id', Auth::User()->id)->get(),
        ];

        return view('userhome.view_permohonan',$data);
    }

    public function details(Request $request)
    {
        $id_permohonan = $request->id;

         $data = [
            'id_menu' => '9',
            'details' => Permohonan::join('doc_pendukung', 'permohonan.id_permohonan', '=', 'doc_pendukung.permohonan_id')
                                    ->join('jenis_file_pendukung','doc_pendukung.jenis_file', '=' , 'jenis_file_pendukung.id_jenis_file')
                                    ->where('users_id', Auth::User()->id)->get(),
            'id_det' => $id_permohonan,
        ];
        // return $data;
        return view('userhome.details',$data);
    }

    public function main(Request $request)
    {
      $id = $request->id;

      $nama_file = Jenis_File_Pendukung::all();
      // $permohonan = Permohonan::find($id);
      $permohonan = Permohonan::join('item_permohonan as item', 'item.permohonan_id', 'permohonan.id_permohonan')
                  ->where('id_permohonan', $id)
                  ->get();
      // return $permohonan;

      //
      // if ($get_doc!=0) {
      //   $nama_file = Doc_Pendukung::join('jenis_file_pendukung', 'doc_pendukung.jenis_file', '=', 'jenis_file_pendukung.id_jenis_file')                         ->where('permohonan_id', $id)->get();
      //   $doc_status = 'update';
      // }else{
      //   $doc_status = 'insert';
      // }

      $data = [
        'id_menu' => '9',
        'nama_form' => $nama_file,
        'id_per'  => $id,
        'jenis_penelitian' => Jenis_Penelitian::all(),
        'permohonan'=>$permohonan,

        // 'jenis_file_pendukung' => Jenis_File_Pendukung::whereNull('is_statis')->get(),
        // 'jenis_file_pendukung_statis' => Jenis_File_Pendukung::whereNotNull('is_statis')->get()
      ];
      // return $data;
      return view('userhome.kelengkapan_doc',$data);
      // return view('userhome.form_permohonan',$data);
    }

    public function do_upload(Request $request)
    {
      // return $request->all();

      $id_jenis_file = $request->id_jenis_file;

      if(isset($request->kirim)){
        $status_permohonan = 'Menunggu Admin';
      }

      for ($i = 0; $i < count($id_jenis_file); $i++) {
        $save_file = Doc_Pendukung::where('jenis_file',$id_jenis_file[$i])->where('permohonan_id',$request->id)->first();
        $tolak_tempat = VerifikasiTempatPenelitian::where('permohonan_id',$request->id)->update(['status_verifikasi' => 'Menunggu']);
        if(!empty($save_file)){
          if(isset($request->kirim)){
            if($save_file->acc_admin=='Tolak'){
              $save_file->acc_admin = 'Menunggu';
              $save_file->tgl_acc_admin = NULL;
              $save_file->doc_status = "Pending";
              $status_permohonan = 'Menunggu Admin';
            }elseif($save_file->acc_kasi=='Tolak'){
              $save_file->acc_kasi = 'Menunggu';
              $save_file->tgl_acc_kasi = NULL;
              $save_file->doc_status = "Pending";
              $status_permohonan = 'Menunggu Kasi';
            }elseif($save_file->acc_kabid=='Tolak'){
              $save_file->acc_kabid = 'Menunggu';
              $save_file->tgl_acc_kabid = NULL;
              $save_file->doc_status = "Pending";
              $status_permohonan = 'Menunggu Kabid';
            }elseif($save_file->acc_kadin=='Tolak'){
              $save_file->acc_kadin = 'Menunggu';
              $save_file->tgl_acc_kadin = NULL;
              $save_file->doc_status = "Pending";
              $status_permohonan = 'Menunggu Kadin';
            }else{
            }
          }
        }else{
          $save_file = new Doc_Pendukung;
          $file_sub_semua_new_name = '';
          $save_file->nama_file 		   = $file_sub_semua_new_name;
          $save_file->acc_admin = 'Menunggu';
          $save_file->acc_kasi = 'Menunggu';
          $save_file->acc_kabid = 'Menunggu';
          $save_file->acc_kadin = 'Menunggu';
          $save_file->doc_status = "Pending";
        }

        if($id_jenis_file[$i]==2 || $id_jenis_file[$i]==3){
          $save_file->no_surat = $request->no_surat[$i];
          $save_file->tanggal_surat = $request->tanggal_surat[$i];
        }

        if ($id_jenis_file[$i]==3) {
          $save_file->nama_pj = $request->nama_pj[$i];
          $save_file->jabatan_pj = $request->jabatan_pj[$i];
        }

        $file_sub_semua = $request->file("file_pendukung".$id_jenis_file[$i]);

        if (!empty ($file_sub_semua)) {
          $ext = $file_sub_semua->getClientOriginalExtension();
          if ($ext != 'pdf' && $ext != 'PDF' && $ext != 'jpg' && $ext != 'JPG' && $ext != 'jpeg' && $ext != 'JPEG' && $ext != 'png' && $ext != 'PNG') {
            return Redirect::to('userhome/')
                  ->with('title', 'Maaf !')
                  ->with('message', 'Tidak sesuai! Upload Ulang')
                  ->with('type', 'error');
          }
          $file_sub_semua_new_name     = time() . 'File_pendukung_'.$id_jenis_file[$i].'.'.$file_sub_semua->getClientOriginalExtension();
          if(!empty($save_file)){
            if($save_file->nama_file!=''){
              if(file_exists('uploads/semua/'.$save_file->nama_file)){
                unlink('uploads/semua/'.$save_file->nama_file);
              }
            }
          }
          $file_sub_semua->move('uploads/semua', $file_sub_semua_new_name);
          $save_file->nama_file 		   = $file_sub_semua_new_name;
        }

        $save_file->jenis_file = $id_jenis_file[$i];
        $save_file->catatan    = "-";
        $save_file->permohonan_id =  $request->id;
        $save_file->save();
      }

      if ($save_file) {
        if(isset($request->kirim)){
          $permohonan = Permohonan::find($request->id);
          $permohonan->status = $status_permohonan;
          $permohonan->save();
        }
        Session::flash('pesan','file success to upload');
      }
      return Redirect::to('userhome/');
    }

}

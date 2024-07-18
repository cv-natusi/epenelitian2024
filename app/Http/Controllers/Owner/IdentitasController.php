<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Libraries\MenuOwner;
use App\Http\Models\Identitas;
use App\bahasa;
use App\Http\Model\Submission;
use Auth;
use App\User;
use App\Tempat_Penelitian;
use Session,Redirect;

class IdentitasController extends Controller
{
  function main(){
    $menu = MenuOwner::menuActive('mn_identitas');
    $data = [
      'title'=>'Identitas',
      'identitas'=>Identitas::find(1),
      'announcement'=>Identitas::find(1),
      'bahasa'=>bahasa::all(),
      'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
      'nama_user' => User::where('users.id',Auth::User()->id)->first(),
    ];
    $data = array_merge($data,$menu);
    return view('owner.identitas.main',$data);
  }

  function simpan(Request $request){
    $nama_web = $request->nama_web;
    $alamat = $request->alamat;
    $email = $request->email;
    $telepon = $request->telepon;
    $fax = $request->fax;

    $identitas = Identitas::find(1);
    $identitas->nama_web = $nama_web;
    $identitas->alamat = $alamat;
    $identitas->email = $email;
    $identitas->telepon = $telepon;
    $identitas->fax = $fax;
    $identitas->save();
    if($identitas){
      $title = 'Success';
      $message = 'Berhasil disimpan';
      $type = 'success';
    }else{
      $title = 'Whooops';
      $message = 'Gagal disimpan';
      $type = 'error';
    }
    Session::flash('title',$title);
    Session::flash('message',$message);
    Session::flash('type',$type);
    return Redirect::route('identitas_owner');
  }

  //pkm

  function main_pkm(){
    $menu = MenuOwner::menuActive('mn_identitas_pkm');

    $data = [
      'title'=>'Identitas Pengguna',
      'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
      'nama_user' => User::where('users.id',Auth::User()->id)->first(),
      'announcement'=>Identitas::find(1),
      'bahasa'=>bahasa::all(),
      'pkm'=>User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian', '=', 'users.tempat_penelitian_id')
                  ->where("id",Auth::User()->id)->first(),
      'tempat_penelitian' => Tempat_Penelitian::all(),
    ];

    $data = array_merge($data,$menu);
    return view('owner.identitas.main_pkm',$data);
  }

  function simpan_pkm(Request $request){
    $username = $request->username;
    $email = $request->email;
    $tempat_penelitian_id = $request->tempat_penelitian_id;

    $identitas = User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian', '=', 'users.tempat_penelitian_id')
                      ->where("id",Auth::User()->id)->first();

    $identitas->username = $username;
    $identitas->email = $email;
    $identitas->tempat_penelitian_id = $tempat_penelitian_id;
    $identitas->save();

    if($identitas){
      $title = 'Success';
      $message = 'Berhasil disimpan';
      $type = 'success';
    }else{
      $title = 'Whooops';
      $message = 'Gagal disimpan';
      $type = 'error';
    }
    
    Session::flash('title',$title);
    Session::flash('message',$message);
    Session::flash('type',$type);
    return Redirect::route('identitas_pkm');
  }  

  public function updatecontact(Request $request){
    $contact = $request->contact;

    $identitas = Identitas::find(1);
    $identitas->contact = $contact;

    $identitas->save();
    if($identitas){
      $title = 'Success';
      $message = 'Berhasil disimpan';
      $type = 'success';
    }else{
      $title = 'Whooops';
      $message = 'Gagal disimpan';
      $type = 'error';
    }
    Session::flash('title',$title);
    Session::flash('message',$message);
    Session::flash('type',$type);
    return Redirect::route('contact');
    }
}

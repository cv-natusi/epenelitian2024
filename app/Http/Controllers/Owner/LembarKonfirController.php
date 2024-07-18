<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Lembar_Konfir;
use App\Http\Libraries\MenuOwner;
use Validator;
use App\Http\Models\Menu;
use Auth;
use App\User;
use Session,Redirect;


class LembarKonfirController extends Controller
{
  	public function index(){
	   	$menu = MenuOwner::menuActive('mn_data_master');
	    $data = [
	      'title'=>'Data Jenis Surat',
	      'lembar_konfirmasi'=>Lembar_Konfir::all(),
        'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
        'nama_user' => User::where('users.id',Auth::User()->id)->first(),

	    ];
	    $data = array_merge($data,$menu);
	    return view('owner.lembar_konfirmasi.index',$data);
	}

	public function datagridlembar_konfir(Request $request)
	{
	  $data = Lembar_Konfir::datagridlembar_konfir($request);
	  return response()->json($data);
	}

	public function create(Request $request)
	{
	    $menu = MenuOwner::menuActive('mn_data_master');
	    $data = [
	      'title'=>'Tambah Lembar Konfirmasi',
	    ];
	    $data = array_merge($data,$menu);

        $content = view('owner.lembar_konfirmasi.create',$data)->render();
        return ['status'=>'success','content'=>$content];

	}

	 public function update(Request $request)
      {
      	$id = $request->id;
        $menu = MenuOwner::menuActive('mn_data_master');
        $data = [
        	'title' => 'Update Lembar Konfirmasi',
        	'jenis' => Lembar_Konfir::find($id),
        ];
        // return $data;
        $data = array_merge($data,$menu);
        $content = view('owner.lembar_konfirmasi.update',$data)->render();
        return ['status'=>'success','content'=>$content];
      }

	public function delete(Request $request)
	  {
	  	$id = $request->id;
    	$do_delete = Lembar_Konfir::find($id);
        if(!empty($do_delete)){
            $do_delete->delete();
            return ['status' => 'success'];
        }else{
            return ['status'=>'error'];
        }
	  }

	  public function do_create(Request $request)
	  {
	  	  $validator=Validator::make($request->all(),[
            'nama_jenis' => 'required',
            'keterangan' => 'required',
        ]);

        $jenispe = new Lembar_Konfir;
        $jenispe->form_konfirmasi = $request->form_konfirmasi;
        $jenispe->keterangan = $request->keterangan;
        // $jenispe->parrent_id = '1';

        $jenispe->save();

          if($jenispe){
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
      return Redirect::route('lembar_konfirmasi');

	  }


      public function do_update(Request $request)
      {
        $upjenis = Lembar_Konfir::where("id_lembar",$request->id_lembar)->first();
        $upjenis->form_konfirmasi = $request->form_konfirmasi;
        $upjenis->keterangan = $request->keterangan;
        $upjenis->save();

      if($upjenis){
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
      return Redirect::route('lembar_konfirmasi');
      }
}

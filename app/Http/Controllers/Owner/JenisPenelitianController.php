<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Libraries\MenuOwner;
use App\Jenis_Penelitian;
use Validator;
use App\Http\Models\Menu;
use Auth;
use Session,Redirect;
use App\User;

class JenisPenelitianController extends Controller
{
 	public function index(){
    $menu = MenuOwner::menuActive('mn_data_master');
    $data = [
      'title'=>'Data Jenis Penelitian',
      'jnspenelitian'=>Jenis_Penelitian::all(),
      'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
      'nama_user' => User::where('users.id',Auth::User()->id)->first(),
    ];
    $data = array_merge($data,$menu);
    return view('owner.jenis_penelitian.index',$data);
	}
  
	public function datagridjenispenelitian(Request $request)
	{
	  $data = Jenis_Penelitian::getJsonJenisPenelitian($request);
	  return response()->json($data);
	}

	public function create(Request $request)
	{
	    $menu = MenuOwner::menuActive('mn_data_master');
	    $data = [
	      'title'=>'Tambah Jenis Penelitian',
	    ];
	    $data = array_merge($data,$menu);

        $content = view('owner.jenis_penelitian.create',$data)->render();
        return ['status'=>'success','content'=>$content];

	}	 

	 public function update(Request $request)
      {
      	$id = $request->id;
        $menu = MenuOwner::menuActive('mn_data_master');
        $data = [
        	'title' => 'Update Jenis Penelitian',
        	'jenis' => Jenis_Penelitian::find($id),
        ];
        // return $data;
        $data = array_merge($data,$menu);
        $content = view('owner.jenis_penelitian.update',$data)->render();
        return ['status'=>'success','content'=>$content];
      }

	public function delete(Request $request)
	  {
	  	$id = $request->id;
    	$do_delete = Jenis_Penelitian::find($id);
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

        $jenispe = new Jenis_Penelitian;
        $jenispe->nama_jenis = $request->nama_jenis;
        $jenispe->keterangan = $request->keterangan;
        $jenispe->parrent_id = '1';		       
       
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
      return Redirect::route('jenis_penelitian');
             
	  }


      public function do_update(Request $request)
      {
        $upjenis = Jenis_Penelitian::where("id_jenis_penelitian",$request->id_jenis_penelitian)->first();
        $upjenis->nama_jenis = $request->nama_jenis;
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
      return Redirect::route('jenis_penelitian');
      }
}
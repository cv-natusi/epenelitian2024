<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Libraries\MenuOwner;
use App\Tempat_Penelitian;
use Validator;
use App\Http\Models\Menu;
use Auth;
use Session,Redirect;
use App\User;

class TempatPenelitianController extends Controller
{
 	public function index(){
    $menu = MenuOwner::menuActive('mn_data_master');
    $data = [
      'title'=>'Data Tempat Penelitian',
      'jnspenelitian'=>Tempat_Penelitian::all(),
      'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
      'nama_user' => User::where('users.id',Auth::User()->id)->first(),

    ];
    $data = array_merge($data,$menu);
    return view('owner.tempat_penelitian.index',$data);
	}
  
	public function datagridtempatpenelitian(Request $request)
	{
	  $data = Tempat_Penelitian::getJsonTempatPenelitian($request);
	  return response()->json($data);
	}

	public function create(Request $request)
	{
	    $menu = MenuOwner::menuActive('mn_data_master');
	    $data = [
	      'title'=>'Tambah Tempat Penelitian',
	    ];
	    $data = array_merge($data,$menu);

        $content = view('owner.tempat_penelitian.create',$data)->render();
        return ['status'=>'success','content'=>$content];

	}	 

	 public function update(Request $request)
      {
      	$id = $request->id;
        $menu = MenuOwner::menuActive('mn_data_master');
        $data = [
        	'title' => 'Update Tempat Penelitian',
        	'tempat' => Tempat_Penelitian::find($id),
        ];
        // return $data;
        $data = array_merge($data,$menu);
        $content = view('owner.tempat_penelitian.update',$data)->render();
        return ['status'=>'success','content'=>$content];
      }

	public function delete(Request $request)
	  {
	  	$id = $request->id;
    	$do_delete = Tempat_Penelitian::find($id);
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
            'category' => 'required',
            'nama_tempat' => 'required',
        ]);

        $tempatpe = new Tempat_Penelitian;
        $tempatpe->nama_tempat = $request->nama_tempat;
        $tempatpe->kategori = $request->category;
        $tempatpe->parrent_id = '1';
       
        $tempatpe->save(); 

          if($tempatpe){
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
      return Redirect::route('tempat_penelitian');
             
	  }


      public function do_update(Request $request)
      {
        $uptempat = Tempat_Penelitian::where("id_tempat_penelitian",$request->id_tempat_penelitian)->first();
        $uptempat->nama_tempat = $request->nama_tempat;
        $uptempat->kategori = $request->category;        
        $uptempat->save(); 

      if($uptempat){
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
      return Redirect::route('tempat_penelitian');
      }
}
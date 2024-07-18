<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;

use App\Http\Libraries\Formatter;
use App\Http\Controllers\Controller;
use App\Http\Libraries\MenuOwner;
use App\Jenis_File_Pendukung;
use Validator;
use App\Http\Models\Menu;
use Auth;
use Session,Redirect;
use App\User;


class JenisFilePendukungController extends Controller
{
    public function index(){
    $menu = MenuOwner::menuActive('mn_data_master');
    $data = [
      'title'=>'Data Jenis File Pendukung',
      'jnspenelitian'=>Jenis_File_Pendukung::all(),
      'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
      'nama_user' => User::where('users.id',Auth::User()->id)->first(),

    ];
    $data = array_merge($data,$menu);
    return view('owner.jenis_file_pendukung.index',$data);
	}
  
	public function datagridjenisfilependukung(Request $request)
	{
	  $data = Jenis_File_Pendukung::getJsonJenisFilePendukung($request);
	  return response()->json($data);
	}

	public function create(Request $request)
	{
	    $menu = MenuOwner::menuActive('mn_data_master');
	    $data = [
	      'title'=>'Tambah Jenis File Pendukung',
	    ];
	    $data = array_merge($data,$menu);

        $content = view('owner.jenis_file_pendukung.create',$data)->render();
        return ['status'=>'success','content'=>$content];

	}	 

	 public function update(Request $request)
      {
      	$id = $request->id;
        $menu = MenuOwner::menuActive('mn_data_master');
        $data = [
        	'title' => 'Update Jenis File Pendukung',
        	'jenis' => Jenis_File_Pendukung::find($id),
        ];
        // return $data;
        $data = array_merge($data,$menu);
        $content = view('owner.jenis_file_pendukung.update',$data)->render();
        return ['status'=>'success','content'=>$content];
      }

	public function delete(Request $request)
	  {
      // return $request->all();
	  	$id = $request->id;
    	$do_delete = Jenis_File_Pendukung::find($id);
        if(!empty($do_delete)){
            $do_delete->delete();
            return ['status' => 'success'];
        }else{
            return ['status'=>'error'];
        }   
	  }

	  public function do_create(Request $request)
	  {
        
        // return $request;
	  	  $validator=Validator::make($request->all(),[
            'nama_jenis' => 'required',       
        ]);

        $doc = $request->doc;

        $jenispe = new Jenis_File_Pendukung;
        $jenispe->nama_jenis = $request->nama_jenis;
        $jenispe->nama_form = Formatter::slug($request->nama_jenis,'_');//anas

        if($doc){//anas
          $public_path = 'lampiran';
          $namaDoc = $doc->getClientOriginalName().'.'.$doc->getClientOriginalExtension();
          $doc->move(public_path($public_path), $namaDoc);
          $jenispe->doc = $namaDoc;
          $jenispe->is_statis = 1;
        }
       
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
      return Redirect::route('jenis_file_pendukung');
             
	  }


      public function do_update(Request $request)
      {
        $doc = $request->doc;

        $upjenis = Jenis_File_Pendukung::where("id_jenis_file",$request->id_jenis_file)->first();
        $upjenis->nama_jenis = $request->nama_jenis;
        $upjenis->nama_form = Formatter::slug($request->nama_jenis,'_');        //anas

        if($doc){//anas
          $public_path = 'lampiran';
          $namaDoc = $doc->getClientOriginalName().'.'.$doc->getClientOriginalExtension();
          $doc->move(public_path($public_path), $namaDoc);
          $upjenis->doc = $namaDoc;
          $upjenis->is_statis = 1;
        }else{
          $upjenis->doc = $request->docOld;
        }

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
      return Redirect::route('jenis_file_pendukung');
      }
}

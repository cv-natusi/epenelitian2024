<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Libraries\MenuOwner;
use App\Http\Models\Identitas;
use App\Http\Models\ArticlePending;
use App\Http\Models\Menu;
use App\Http\Model\Submission;
use App\bahasa;
use App\User;
use Auth;

use Session,Redirect;

class MenuController extends Controller
{
  function main(){
    $menu = MenuOwner::menuActive('mn_data_master');
    $data = [
      'menus'=>Menu::orderBy('id_menu','ASC')->get(),
      'title'=>'Data Master Menu',
      'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
      'nama_user' => User::where('users.id',Auth::User()->id)->first(),

    ];
    $data = array_merge($data,$menu);
    return view('owner.master_data.menu.main',$data);
  }

  function form(Request $request){
    $id_menu = $request->id;
    $menu = Menu::find($id_menu);
    $data = [
      'menu'=>$menu,
    ];
    $content = view('owner.master_data.menu.form',$data)->render();
    return ['status'=>'success','content'=>$content];
  }

  function simpan(Request $request){
    // return $request->all();
    $id_menu = $request->id_menu;
    $indo = $request->menu_indo;
    $inggris = $request->menu_inggris;
    $menu = Menu::find($id_menu);
    $menu->nama_menu = $indo;
    $menu->name_menu = $inggris;
    $menu->save();
    if($menu){
      Session::flash('title','Success');
      Session::flash('message','Berhasil disimpan');
      Session::flash('type','success');
      $status = 'success';
    }else{
      $status = 'error';
    }
    return ['status'=>$status];
  }
  function contact(Request $request)
  {

    $menu = MenuOwner::menuActive('mn_data_master');
    $data = [
      'menus'=>Menu::orderBy('id_menu','ASC')->get(),
      'title'=>'Contact',
      'identitas' =>Identitas::find(1),
       'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
      'nama_user' => User::where('users.id',Auth::User()->id)->first(),

    ];
    $data = array_merge($data,$menu);

    return view('owner.master_data.menu.contact',$data);
  }
  function announcement(Request $request)
  {
    $menu = MenuOwner::menuActive('mn_data_master');
    $data = [
      'menus'=>Menu::orderBy('id_menu','ASC')->get(),
      'title'=>'Announcement',
      'announcement'=>Identitas::find(1),
      'bahasa'=>bahasa::find(4),
      'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
      'nama_user' => User::where('users.id',Auth::User()->id)->first(),
    ];
    $data = array_merge($data,$menu);
    return view('owner.master_data.menu.announcement',$data);
  }

  public function doupdate_bahasa(Request $request)
  {
   $bahasa = bahasa::find(4);
   $bahasa->inggris = $request->inggris;
   $bahasa->indonesia = $request->indonesia;

   $bahasa->save();

     if($bahasa){
       Session::flash('title','Success');
       Session::flash('message','Berhasil disimpan');
       Session::flash('type','success');
     }else{
       Session::flash('title','Whoopess');
       Session::flash('message','Gagal disimpan');
       Session::flash('type','error');
     }

      return Redirect::to('data_master/menu/announcement');
 }

  function articleinpress(Request $request)
  {
    $menu = MenuOwner::menuActive('mn_data_master');
    $data = [
      'title'=>'Aritcle In Press',
      'submissions'=>Menu::find(1),
    ];
    $data = array_merge($data,$menu);
    return view('owner.master_data.menu.articleinpress',$data);
  }
    public function journalDatagrid(Request $request)
    {
        $data = ArticlePending::getJsonEditor($request);
        return response()->json($data);
    }

    public function detailJournal(Request $request)
    {
      $menu = MenuOwner::menuActive('mn_management');
      $berita =ArticlePending::where("id",$request->id)->first();
          $data['id'] = $berita;
          $data['title'] = 'Detail Journal';
          $data = array_merge($data,$menu);
          $content = view('owner.master_data.menu.detail',$data)->render();
          return ['status'=>'success','content'=>$content];
    }
    public function doDeleteJournal(Request $request)
    {
      $kata = ArticlePending::where("id",$request->id)->first();
          if(!empty($kata)){
              $kata->delete();
              return ['status' => 'success'];
          }else{
              return ['status'=>'error'];
          }
      }
    public function update_journal(Request $request)
    {
      $menu = MenuOwner::menuActive('mn_management');
      $berita = ArticlePending::where("id",$request->id)->first();
          $data['users_id'] = $berita;
          $data['title'] = 'Edit Journal';
          $data = array_merge($data,$menu);
          $content = view('owner.master_data.menu.updateJournal',$data)->render();
          return ['status'=>'success','content'=>$content];
    }
}

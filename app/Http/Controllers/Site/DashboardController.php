<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Libraries\MenuSite;
use App\HasilPenelitian;
use Session;
use App\bahasa;
use App\Identitas;

use App\Submission;
class DashboardController extends Controller
{
  function main(){

     $submission = Submission::where('updated_at', 'LIKE','%'.date('Y').'-%')->where('status','publish')->orderBy('updated_at','DESC')->distinct()->get();

     $submission = HasilPenelitian::join('doc_hasil as dok','dok.permohonan_id','hasil_penelitian.permohonan_id')
      ->join('permohonan as p','p.id_permohonan','hasil_penelitian.permohonan_id')
      ->join('profiles as pro','pro.users_id','p.users_id')
      ->where('dok.jenis_hasil_id', '1')
      ->where('status_hasil', 'Publish')
      ->where('p.updated_at', 'LIKE','%'.date('Y-m').'-%')
      ->orderBy('p.updated_at','DESC')->distinct()->get();

     $bahasa = [
        'bahasa1' => bahasa::find(1),
        'bahasa2' => bahasa::find(2),
        'bahasa3' => bahasa::find(3),
        'bahasa4' => bahasa::find(4),
        'bahasa5' => bahasa::find(5),
     ];
    $data = [
      'id_menu'=>'1',
      'submission' => $submission,
      'bahasa' => $bahasa,
      'announcement' =>Identitas::first(),
    ];
    return view('home.main',$data);
  }

  function setBahasa(Request $request){
    $bahasa = $request->bahasa;
    Session::put('bahasa',$request->bahasa);
    return ['status'=>'success'];
  }

   public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

}

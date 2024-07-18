<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Submission;
use App\HasilPenelitian;
use DB;
use Auth,Redirect,Hash,Session;

class CurrentController extends Controller
{
  function main(){

    // $submission = Submission::where('updated_at', 'LIKE','%'.date('Y').'-%')->where('status','publish')->orderBy('updated_at','DESC')->distinct()->get();
    $submission = HasilPenelitian::join('doc_hasil as dok','dok.permohonan_id','hasil_penelitian.permohonan_id')
      ->join('permohonan as p','p.id_permohonan','hasil_penelitian.permohonan_id')
      ->join('profiles as pro','pro.users_id','p.users_id')
      ->where('dok.jenis_hasil_id', '1')
      ->where('status_hasil', 'Publish')
      ->orderBy('id_hasil_penelitian','DESC')->distinct()->get();

    $data = [
      'id_menu'=>'5',
      'submission'=> $submission,
    ];
    return view('current.main',$data);
  }

  public function det_viewCurrent($id)
  {
    // $submisDet = Submission::find($id);
    $submisDet = HasilPenelitian::join('doc_hasil as dok','dok.permohonan_id','hasil_penelitian.permohonan_id')
      ->join('permohonan as p','p.id_permohonan','hasil_penelitian.permohonan_id')
      ->join('profiles as pro','pro.users_id','p.users_id')
      ->where('dok.jenis_hasil_id', '1')
      ->where('status_hasil', 'Publish')
      ->where('hasil_penelitian.id_hasil_penelitian', $id)
      ->first();

    $data = [
      'id_menu'=>'5',
      'submission'=> $submisDet,
    ];
       // return $submission;
    return view('current.det_viewCurrent', $data);
  }

  public function ViewFileIn($id)
  {
    // $submisView = Submission::find($id);
    $submisView = HasilPenelitian::join('doc_hasil as dok','dok.permohonan_id','hasil_penelitian.permohonan_id')
      ->join('permohonan as p','p.id_permohonan','hasil_penelitian.permohonan_id')
      ->join('profiles as pro','pro.users_id','p.users_id')
      ->where('dok.jenis_hasil_id', '1')
      ->where('status_hasil', 'Publish')
      ->where('hasil_penelitian.id_hasil_penelitian', $id)
      ->first();

    $data = [
      'id_menu'=>'5',
      'submission'=> $submisView,
    ];
       // return $submission;
    return view('current.Current', $data);
  }
}

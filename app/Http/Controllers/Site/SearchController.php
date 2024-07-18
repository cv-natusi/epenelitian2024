<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Submission;
use App\HasilPenelitian;
use Validator;
use App\bahasa;


class SearchController extends Controller
{
  function main(){

    $bahasa = [
        'bahasa10' => bahasa::find(10),
        'bahasa11' => bahasa::find(11),
        'bahasa12' => bahasa::find(12),
        'bahasa13' => bahasa::find(13),
        'bahasa14' => bahasa::find(14),
        'bahasa15' => bahasa::find(15),
     ];

    $data = [
      'id_menu'=>'10',
      'bahasa'=>$bahasa,
    ];
    return view('search.main',$data); 
  }
  function author(){
        $bahasa = [
        'bahasa10' => bahasa::find(10),
        'bahasa11' => bahasa::find(11),
        'bahasa12' => bahasa::find(12),
        'bahasa13' => bahasa::find(13),
        'bahasa14' => bahasa::find(14),
        'bahasa15' => bahasa::find(15),
     ];
    $data = [
      'id_menu'=>'10',
      'bahasa' =>$bahasa,
    ];
    return view('search.author',$data);
  }
  function title(){
        $bahasa = [
        'bahasa10' => bahasa::find(10),
        'bahasa11' => bahasa::find(11),
        'bahasa12' => bahasa::find(12),
        'bahasa13' => bahasa::find(13),
        'bahasa14' => bahasa::find(14),
        'bahasa15' => bahasa::find(15),
     ];
    $data = [
      'id_menu'=>'10',
      'bahasa'=>$bahasa,
    ];
    return view('search.title',$data);
  }

  public function Search_Sub(Request $request)
  {

    // $search = Submission::select('*','submissions.title as title_sub','submissions.id as id_sub')
    //                       ->join('supplementaries', 'submissions.id', '=', 'supplementaries.submission_id')
    //                       ->join('author_submits', 'submissions.id', '=', 'author_submits.submission_id')
    //                       ->where('status','publish')
    //                       ->where('submissions.title','like','%'.$request->search.'%')
    //                       ->orWhere('first_name','like','%'.$request->search.'%')
    //                       ->orWhere('last_name','like','%'.$request->search.'%')
    //                       ->orWhere('middle_name','like','%'.$request->search.'%')
    //                       ->orWhere('abstract','like','%'.$request->search.'%')
    //                       ->orWhere('keywords','like','%'.$request->search.'%')
    //                       ->orWhere('type','like','%'.$request->search.'%')
    //                       ->orderBy('submissions.id','DESC')->get();

    // $submisDet = HasilPenelitian::join('doc_hasil as dok','dok.permohonan_id','hasil_penelitian.permohonan_id')
    //   ->join('permohonan as p','p.id_permohonan','hasil_penelitian.permohonan_id')
    //   ->join('profiles as pro','pro.users_id','p.users_id')
    //   ->where('dok.jenis_hasil_id', '1')
    //   ->where('status_hasil', 'Publish')
    //   ->where('hasil_penelitian.id_hasil_penelitian', $id)
    //   ->first();

    $validator=Validator::make($request->all(),[
            'search' => 'required',
          ]);

    if ($request->search != '') {
      $search = HasilPenelitian::join('doc_hasil as dok','dok.permohonan_id','hasil_penelitian.permohonan_id')
                              // ->join('permohonan as p','p.id_permohonan','hasil_penelitian.permohonan_id')
      ->join('permohonan as p',function($join)
      {
        $join->on('p.id_permohonan', 'hasil_penelitian.permohonan_id');
        $join->where('dok.jenis_hasil_id', '1');
      })
      ->join('profiles as pro','pro.users_id','p.users_id')
      ->where('status_hasil', 'Publish')
      ->where('p.judul_penelitian','like','%'.$request->search.'%')
      ->orWhere('first_name','like','%'.$request->search.'%')
      ->orWhere('last_name','like','%'.$request->search.'%')
      ->orWhere('middle_name','like','%'.$request->search.'%')
      ->orWhere('abstrak','like','%'.$request->search.'%')
      ->where('dok.jenis_hasil_id', '1')
      ->orderBy('id_hasil_penelitian','DESC')->get();
    }else {
      $search = [];
    }

      $bahasa = [
        'bahasa10' => bahasa::find(10),
        'bahasa11' => bahasa::find(11),
        'bahasa12' => bahasa::find(12),
        'bahasa13' => bahasa::find(13),
        'bahasa14' => bahasa::find(14),
        'bahasa15' => bahasa::find(15),
     ];

       $data = [
          'id_menu' =>'10',
          'search'  => $search,
          'bahasa'=>$bahasa,
        ];
        return view('search.main',$data);                          
  }
}
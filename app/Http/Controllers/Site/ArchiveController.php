<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Author_submit;
use App\Profile;
use App\Registrasi;
use App\User;
use App\Submission;
use App\Supplementary;
use App\Reviewer;
USE App\bahasa;
use Validator;
use DB;
use Auth,Redirect,Hash,Session;

class ArchiveController extends Controller
{
  public function main()
  {
    $tahun = Submission::select(DB::raw('YEAR(updated_at) as tahun'))->where('status','publish')->orderBy('updated_at','DESC')->distinct()->get();

     $bahasa = [
        'bahasa6' => bahasa::find(6),
        'bahasa7' => bahasa::find(7),
        'bahasa8' => bahasa::find(8),

     ];

    $data = [
      'id_menu'=>'6',
      'tahun'=>$tahun,
      'bahasa'=>$bahasa,
    ];
    // return $tahun;
    return view('archive.main',$data);
  }

  public function viewArchive(Request $request)
  {
    if ($request->semester == '1') {
      $submission = submission::whereBetween('updated_at', [$request->thn.'-01-1%', $request->thn.'-06-30%'])->where('status','publish')->get();
    }else{
      $submission = submission::whereBetween('updated_at', [$request->thn.'-07-1%', $request->thn.'-12-31%'])->where('status','publish')->get();
    }

  	$data = [
  		'id_menu'=>'6',
      'submission'=> $submission,
  	]; 
    return view('archive.viewArchive', $data);
  }

  public function det_ViewArchive($id)
  {
    $submisDet = Submission::find($id);

    $data = [
      'id_menu'=>'6',
      'submission'=> $submisDet,
    ];
       // return $submission;
    return view('archive.det_ViewArchive', $data);
  }

  public function ViewFile($id)
  {
    $submisView = Submission::find($id);

    $data = [
      'id_menu'=>'6',
      'submission'=> $submisView,
    ];
       // return $submission;
    return view('archive.Archive', $data);
  }

}

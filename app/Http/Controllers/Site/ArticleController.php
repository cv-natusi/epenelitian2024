<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Submission;
use DB;
use App\bahasa;
use Auth,Redirect,Hash,Session;

class ArticleController extends Controller
{
  function main(){
  	$submission = Submission::where('updated_at', 'LIKE','%'.date('Y').'-%')->where('status','accept')->orderBy('updated_at','DESC')->distinct()->get();

  	$bahasa = [
        'bahasa9' => bahasa::find(9),
     ];

    $data = [
      'id_menu'=>'8',
      'submission'=> $submission,
      'bahasa'	=> $bahasa,
    ];
    return view('article.main',$data);
  }
}

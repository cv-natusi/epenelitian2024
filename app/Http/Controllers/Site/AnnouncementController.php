<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Identitas;
use App\bahasa;

class AnnouncementController extends Controller
{
  function main(){

  	$bahasa = [
        'bahasa2' => bahasa::find(2),
        'bahasa4' => bahasa::find(4),

     ];

    $data = [
      'id_menu'=>'7',
      'announcement' =>Identitas::find(1),
      'bahasa'	=> $bahasa,
    ];
    return view('announcement.main',$data);
  }
}

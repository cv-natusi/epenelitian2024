<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Profile;
use App\User;
use App\Http\Models\Identitas;
use Hash;
use App\bahasa;

class AboutController extends Controller
{
  function main(){
    $bahasa = [
            'bahasa54' => bahasa::find(54),
            'bahasa55' => bahasa::find(55),
            'bahasa56' => bahasa::find(56),            
        ];

    $data = [
      'id_menu'=>'2',
      'bahasa'=>$bahasa,
    ];
    return view('about.main',$data);
  }
  function contact(){
    $bahasa = [           
            'bahasa56' => bahasa::find(56),            
        ];

    $data = [
      'id_menu'=>'2',
      'contact' =>Identitas::find(1),
      'bahasa' =>$bahasa,
    ];
    
    return view('about.contact',$data);
  } 
 
  function sop(){
     $bahasa = [           
            'bahasa55' => bahasa::find(55),            
        ];
    $data = [
      'id_menu'=>'2',
      'bahasa'=>$bahasa,
    ];
    return view('about.sop',$data);
  }
}
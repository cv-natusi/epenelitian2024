<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Identitas;
use App\Http\Models\Management_user;

class HomeController extends Controller
{
    function announcement(Request $request)
    {
      $data = [
        'menus'=>Menu::orderBy('id_menu','ASC')->get(),
        'title'=>'Announcement',
        'announcement'=>Identitas::find(1),
      ];
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function myCaptcha()
    {
        return view('myCaptcha');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function myCaptchaPost(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha'=>'Invalid captcha code.']);
        dd("You are here :) .");
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }}

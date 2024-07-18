<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use Auth,Redirect,Hash,Session;

class LoginController extends Controller
{
  function main(){
    $data = [
      'id_menu'=>'3',
    ];
    return view('login.main',$data);
  }

  function doLogin(Request $request)
  {
    $username = $request->username;
    $password = $request->password;
    $user = User::whereRaw("username='$username' OR email='$username'")->first();
    if(!empty($user)){
      if(Hash::check($password,$user->password)){
        $credential = [
          'email' => $user->email,
          'password' =>$password,
        ];
        Auth::attempt($credential);
        if (Auth::user()->is_banned == 0) {

          return Redirect::to('userhome');
        }else {
          // Auth::logout();
          Session::flash('pesan','Akun sedang di Non-Aktfikan, Hubungi Admin !!');
          return Redirect::route('login');
        }
      }else{
        Session::flash('pesan','Wrong Password');
        return Redirect::route('login');
      }
    }else{
      Session::flash('pesan','you must to Registration');
      return Redirect::route('login');
    }
  }

  public function log_admin()
  {
    return view('owner.log_admin');
  }

  public function dolog_admin(Request $request)
  {
    $username = $request->username;
    $password = $request->password;
    $user = User::whereRaw("username='$username' OR email='$username'")->first();
    if(!empty($user)){
      if(Hash::check($password,$user->password)){
        $credential = [
        'email' => $user->email,
        'password' =>$password,
        ];
        Auth::attempt($credential);
        return Redirect::to('owner');
      }else{
        return Redirect::route('log_admin')->with('title', 'Whoops')->with('message', 'Wrong Password')->with('type', 'error');
      }
    }else{
      return Redirect::route('log_admin')->with('title', 'you must to Registration')->with('message', 'You do not have an account')->with('type', 'error');
    }
  }
  public function logout(){
    \Auth::logout();
    return redirect('/'); // ini untuk redirect setelah logout
  }

  public function logout_admin(){
    \Auth::logout();
    return redirect('/owner'); // ini untuk redirect setelah logout
  }
}

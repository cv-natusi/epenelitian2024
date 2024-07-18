<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
          if(Auth::User()->level==1 || Auth::User()->level==2 || Auth::User()->level==4 || Auth::User()->level==5 || Auth::User()->level==6){
            return $next($request);
          }else{
            return redirect('/');
          }
        }
        return redirect('/log_admin/');
    }
}

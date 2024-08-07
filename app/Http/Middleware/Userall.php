<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class Userall
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
            return $next($request);
        }

        return redirect('/');
    }
}

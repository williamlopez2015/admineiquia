<?php

namespace sisadmineiquia\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminSist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->adminsist()=="adminsist") {
            return $next($request);
        }else{
            //return redirect()->guest('/');
            abort(401);
        }
        
        
    }
}

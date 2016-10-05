<?php

namespace sisadmineiquia\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Secret
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
        if (Auth::user()->type=="secret" || Auth::user()->type=="adminsist") {
            return $next($request);
        }else{
            //return redirect()->guest('/');
            abort(401);
        }
        
        
    }
}

<?php

namespace sisadmineiquia\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminSistAdminSecret
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
        if (Auth::user()->type== "admin" || Auth::user()->type== "adminsist" || Auth::user()->type== "secret") {
            return $next($request);
        }else{
            //return redirect()->guest('/');
            //dd(Auth::user()->type);
            abort(401);
        }
    }
}

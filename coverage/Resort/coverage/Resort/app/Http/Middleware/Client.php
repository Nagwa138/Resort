<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;


use Closure;

class Client
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
        // IF user is not client route loginCleint
        if(!Auth::guard($guard)->check())
        {
            return redirect('/clients/loginClient');    
        }
        return $next($request);
    }
}

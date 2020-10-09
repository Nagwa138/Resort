<?php

namespace App\Http\Middleware;


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Client
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
        // IF user is not client route loginCleint
        
        if (!Auth::guard($guard)->check()) {
            return redirect('/clients/LoginCleint');
        }

        return $next($request);
    }
}

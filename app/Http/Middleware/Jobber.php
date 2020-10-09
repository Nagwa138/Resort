<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Jobber
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
        
        // IF user is not Jobber route loginCleint
        
        if (!Auth::guard($guard)->check()) {
            return redirect('/jobbers/LoginJobber');
        }

        return $next($request);
    }
}

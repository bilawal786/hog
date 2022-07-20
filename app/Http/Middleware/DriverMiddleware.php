<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DriverMiddleware
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
        if(Auth::user())
        {
            if(Auth::user()->role == 'driver' || Auth::user()->role == 'admin'){
                return $next($request);
            }
            else{
                Auth::logout();
                return redirect('/driver/login');
            }
        }else{
            abort(403);
        }
    }
}

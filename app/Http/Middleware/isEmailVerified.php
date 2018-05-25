<?php

namespace App\Http\Middleware;

use Closure;

class isEmailVerified
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
        if(Auth::check() && Auth::user()->isEmailVerified()){
            return $next($request);
        }
        return redirect('home');
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;


class isVerified
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
        if(Auth::guard('web')->check() && Auth::guard('web')->user()->verifed ||
           Auth::guard('company')->check() && Auth::guard('company')->user()->verifed){
            return $next($request);
        }
        return redirect(route('verify'));
    }
}

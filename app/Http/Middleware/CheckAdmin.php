<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if (\Auth::User()->hasRole('Admin')) {
            return $next($request);
        }
        elseif(\Auth::User()->hasRole('Account'))
        {
             return $next($request);
        }        
         return redirect("flush");
    }
}

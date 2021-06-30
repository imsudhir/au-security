<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuardAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('GUARD_LOGIN')){
            
        } else {
            $request->session()->flash('error','Access denied');
            return redirect ('guard');
         }
        return $next($request);
    }
}

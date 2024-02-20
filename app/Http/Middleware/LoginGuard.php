<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        if (!auth()->check()) {
            return $next($request);
        } else {
            return back();
        }
    }






































    
}












































 // if(!session()->has('user'))
        // return $next($request);
        // else{
        //     return back();
        // }
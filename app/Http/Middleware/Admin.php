<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(!auth()->check() || !auth()->user()->is_admin){
        //     abort(403);
        // }
        // return $next($request); 
       Log::info(auth()->user()->name);
       
        if(auth()->check() && auth()->user()->is_admin == 1){
            return $next($request);
            }
           return redirect()->route('login');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class Permission
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
        /* dd(auth()); */
        /* if(!isset(auth()->user()->name)){
            return redirect()->view('welcome');
        } */

        /* return $next($request); */
    }
}

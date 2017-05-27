<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \Closure $next
         * @return mixed
         */

        if (Auth::check()
            && Auth::user()->email == "margaux.dubezin@hotmail.fr"
            || Auth::user()->email == "fscalabrin2@gmail.com"
            || Auth::user()->email == "louise.danicourt@hotmail.fr") {
            return $next($request);
        }

    }

}

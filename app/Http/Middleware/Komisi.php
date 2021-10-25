<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Komisi
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
        if (auth()->user()->level_id == 1) {
            return $next($request);
        } else

            return redirect('/')->with('error', "Maaf Anda Bukan Komisi!!");
        //return $next($request);
    }
}

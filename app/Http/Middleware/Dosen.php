<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Dosen
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
        if (auth()->user()->level_id == 3) {
            return $next($request);
        } else

            return redirect('/')->with('error', "Maaf Anda Bukan Dosen!!");
        //return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class Asisten
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
        $asAsisten = \Auth::guard('mahasiswa')->user()->asAsisten()->count();

        if ($asAsisten == 0) {
            return redirect()->route('mahasiswa');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class Guest
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
        $guard = ['mahasiswa', 'dosen'];
        for ($index=0; $index < count($guard) ; $index++) { 
            if (\Auth::guard($guard[$index])->user()) {
                return redirect()->route( $guard[$index] . '.home' );
            }
        }
        return $next($request);
    }
}

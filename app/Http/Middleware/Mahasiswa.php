<?php

namespace App\Http\Middleware;

use Closure;

class Mahasiswa
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
        # Jika Bukan Mahasiswa 
    	if( ! \Auth::guard('mahasiswa')->check())
    		return redirect()->route('mahasiswa.login');
        return $next($request);
    }
}

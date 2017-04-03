<?php

namespace App\Http\Middleware;

use Closure;

class Dosen
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
        if (!\Auth::guard('dosen')->check()) {
            return redirect()->route('dosen.login');
        }

        return $next($request);
    }
}

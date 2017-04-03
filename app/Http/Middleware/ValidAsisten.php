<?php

namespace App\Http\Middleware;

use Closure;

class ValidAsisten
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
        $asAsisten = \Auth::guard('mahasiswa')->user()->asAsisten;

        foreach ($asAsisten as $asisten) {
            if ($request->route('id') == $asisten->id) {
                return $next($request);
            }
        }

        return redirect()->route('asisten.index');

    }
}

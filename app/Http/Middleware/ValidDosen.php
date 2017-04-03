<?php

namespace App\Http\Middleware;

use Closure;

class ValidDosen
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
        $praktikkums = \Auth::guard('dosen')->user()->praktikkum;

        foreach ($praktikkums as $praktikkum) {
            if ($request->route('id') == $praktikkum->id ) {
                return $next($request);
            }
        }

        return redirect()->route('dosen.praktikkum.index');
    }
}

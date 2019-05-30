<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Manajer
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
      if (Auth::check() && Auth::user()->id_jabatan == 3) {
            return $next($request);
          }
          elseif (Auth::check() && Auth::user()->id_jabatan == 4) {
            return redirect('/kabid');
          }
          elseif (Auth::check() && Auth::user()->id_jabatan == 2) {
            return redirect('/adminhr');
          }
          elseif (Auth::check() && Auth::user()->id_jabatan == 1) {
            return redirect('/pimpinan');
          }
    }
}

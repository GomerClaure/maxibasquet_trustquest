<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Juez
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $idRol = auth()->user()->IdRol;
        if ($idRol==1 || $idRol==2 || $idRol==5) {
            return $next($request);
        }
        return abort(404);
    }
}

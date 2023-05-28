<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek Kondisi
        // Jika login sebagai admin maka lanjutkan
        if (Auth()->user()->usertype=='admin') {
            return $next($request);
        }

        // Jika bukan maka gagalkan
        abort(401); //401 : Unauthorized
    }
}

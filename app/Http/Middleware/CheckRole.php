<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Periksa apakah pengguna terautentikasi
        if (Auth::check()) {
            // Periksa apakah pengguna memiliki peran yang sesuai
            if (in_array(Auth::user()->role, $roles)) {
                return $next($request);
            }
        }

        // Redirect atau berikan respons sesuai kebijakan akses yang Anda inginkan
        abort(403, 'Unauthorized');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User; // Asegúrate de importar tu modelo User

class IsStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Modificación: Permitir el paso si es estudiante, admin o super admin.
        if (Auth::check() && (Auth::user()->isStudent() || Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())) {
            return $next($request);
        }

        abort(403, 'Acceso no autorizado.'); // O redirige a otra página, como habíamos hablado.
    }
}
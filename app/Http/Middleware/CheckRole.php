<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Jeśli użytkownik nie ma odpowiedniej roli, przekieruj na stronę główną lub do innego miejsca
        return redirect('/');
    }
}

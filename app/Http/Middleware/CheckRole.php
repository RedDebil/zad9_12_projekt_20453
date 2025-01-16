<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            // Hierarchia ról (od najniższej do najwyższej)
            $rolesHierarchy = [
                'mod' => 1,
                'admin' => 2,
            ];

            // Sprawdź, czy użytkownik ma odpowiednią rolę lub wyższą
            if (isset($rolesHierarchy[$userRole]) && isset($rolesHierarchy[$role])) {
                if ($rolesHierarchy[$userRole] >= $rolesHierarchy[$role]) {
                    return $next($request);
                }
            }
        }

        // Jeśli użytkownik nie ma dostępu, przekieruj
        return redirect('/access-denied')->with('error', 'Brak dostępu do tej strony.');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Get current user's role
        $userRole = auth()->user()->role;

        // Check if role is allowed
        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
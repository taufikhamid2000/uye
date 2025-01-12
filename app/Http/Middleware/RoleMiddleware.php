<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            abort(403, 'Unauthorized access');
        }

        // Check if the user role matches the required role
        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized access');
        }

        // Allow request to proceed if the role matches
        return $next($request);
    }
}

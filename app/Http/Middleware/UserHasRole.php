<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class UserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has at least one role
        if (Auth::check() && Auth::user()->roles->isEmpty()) {
            Auth::logout();  // Log out the user
            return redirect()->route('login')->withErrors(['role' => 'You do not have any roles assigned. Contact the administrator.']);
        }
        return $next($request);
    }
}

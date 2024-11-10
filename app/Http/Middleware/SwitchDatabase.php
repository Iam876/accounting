<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\DatabaseSwitcher;

class SwitchDatabase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('database_year')) {
            $year = session('database_year');
            DatabaseSwitcher::switchToYearlyDatabase($year);
        }

        return $next($request);
    }
}

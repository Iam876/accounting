<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\DatabaseSwitcher;

class SwitchDatabase
{
    public function handle($request, Closure $next)
    {
        // Check if a `database_year` is set in the session
        if (session()->has('database_year')) {
            $year = session('database_year');
            DatabaseSwitcher::switchToYearlyDatabase($year); // Switch to specified yearly database
        } else {
            // If no specific year is set, revert to the default database
            DatabaseSwitcher::switchToYearlyDatabase(null);
        }

        return $next($request);
    }
}

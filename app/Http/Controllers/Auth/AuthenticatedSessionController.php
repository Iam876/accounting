<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use App\Helpers\DatabaseSwitcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $availableYears = DatabaseSwitcher::getAvailableDatabases();
        // dd($availableYears); // Check if you now see the available years
        return view('auth.login', compact('availableYears'));
    }


    /**
     * Handle an incoming authentication request.
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //         'database_year' => 'required|integer',
    //     ]);

    //     // Get the selected database year and switch the database
    //     $databaseYear = $request->input('database_year');
    //     DatabaseSwitcher::switchToYearlyDatabase($databaseYear);

    //     // Store the selected database year in the session
    //     $request->session()->put('database_year', $databaseYear);

    //     // Attempt to authenticate the user in the selected database
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         $request->session()->regenerate();
    //         return redirect()->intended(RouteServiceProvider::HOME);
    //     }

    //     // If login fails, switch back to the default database and redirect with error
    //     DatabaseSwitcher::switchToYearlyDatabase(null); // Reset to default
    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }


    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //         'database_year' => 'required|integer',
    //     ]);

    //     // Get the selected database year and switch the database
    //     $databaseYear = $request->input('database_year');
    //     DatabaseSwitcher::switchToYearlyDatabase($databaseYear);

    //     // Store the selected database year in the session
    //     $request->session()->put('database_year', $databaseYear);

    //     // Attempt to authenticate the user in the selected database
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         $request->session()->regenerate();
    //         return redirect()->intended(RouteServiceProvider::HOME);
    //     }

    //     // If login fails, switch back to the default database and redirect with error
    //     DatabaseSwitcher::switchToYearlyDatabase(null); // Reset to default
    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }



    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
        'database_year' => 'required',
    ]);

    // Get the selected database year
    $databaseYear = $request->input('database_year');

    // Check if the default database is selected
    if ($databaseYear !== 'default') {
        // Switch to the selected yearly database
        DatabaseSwitcher::switchToYearlyDatabase($databaseYear);
        $request->session()->put('database_year', $databaseYear);
    } else {
        // If default is selected, clear any session database setting
        $request->session()->forget('database_year');
    }

    // Attempt to authenticate the user in the selected or default database
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    // If login fails, switch back to the default database and redirect with error
    DatabaseSwitcher::switchToYearlyDatabase(null); // Reset to default
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}





    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

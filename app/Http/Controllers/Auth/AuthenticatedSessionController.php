<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
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
       
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    // Authenticate the user
    $request->authenticate();

    // Regenerate session to prevent session fixation
    $request->session()->regenerate();

    // Check the authenticated user's role
    $user = $request->user(); // Get the authenticated user

    if ($user->acc_type === 'tenant') {
        // Redirect to tenant dashboard
        return redirect()->route('dashboard');
    } elseif ($user->acc_type === 'admin') {
        // Redirect to admin dashboard
        return redirect()->route('admin.dashboard');
    }

    // Default redirection if no specific role matches
    return redirect()->route('home');
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

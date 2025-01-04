<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleBasedRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $currentRouteName = $request->route()->getName();

            // Redirect based on user role, avoiding infinite loop
            if ($user->acc_type === 'admin' && $currentRouteName !== 'admin.dashboard') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->acc_type === 'user' && $currentRouteName !== 'dashboard') {
                return redirect()->route('dashboard');
            }
        }

        // Allow request to proceed
        return $next($request);
    }
}

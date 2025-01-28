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
            $user = Auth::user(); // Get the authenticated user

            // Restrict access if the user's role is 'tenant' but accessing admin routes
            if ($user->acc_type === 'tenant' && $request->is('admin/*')) {
                return redirect()->route('dashboard')->with('error', 'Unauthorized access to admin routes.');
            }

            // Restrict access if the user's role is 'admin' but accessing tenant routes
            if ($user->acc_type === 'admin' && $request->is('tenant/*')) {
                return redirect()->route('admin.dashboard')->with('error', 'Unauthorized access to tenant routes.');
            }
        }

        // Allow the request to proceed if no restrictions apply
        return $next($request);
    }
}


<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
        {
            // Check if the email is already verified
            if ($request->user()->hasVerifiedEmail()) {
                // Redirect based on user role
                return $this->redirectBasedOnRole($request->user());
            }

            // Mark email as verified
            if ($request->user()->markEmailAsVerified()) {
                event(new Verified($request->user()));
            }

            // Redirect based on user role
            return $this->redirectBasedOnRole($request->user());
        }

        /**
         * Redirect the user based on their role.
         *
         * @param  \App\Models\User  $user
         * @return \Illuminate\Http\RedirectResponse
         */
        protected function redirectBasedOnRole($user): RedirectResponse
        {
            if ($user->acc_type === 'tenant') {
                return redirect()->intended(route('dashboard', ['verified' => 1]));
            }

            if ($user->acc_type === 'admin') {
                return redirect()->intended(route('admin.dashboard', ['verified' => 1]));
            }

            // Default redirect (for other user types)
            return redirect()->intended(route('dashboard', ['verified' => 1]));
        }

}

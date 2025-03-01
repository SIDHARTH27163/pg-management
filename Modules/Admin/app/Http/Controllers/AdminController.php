<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserInvitation;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('admin::index');
    }

    public function sendInvite(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $token = base64_encode($request->email . '|' . now()); // Unique token

        // Send email with the invitation link
        Mail::to($request->email)->send(new UserInvitation($token));

        return back()->with('success', 'Invitation sent successfully!');
    }
    
    
}

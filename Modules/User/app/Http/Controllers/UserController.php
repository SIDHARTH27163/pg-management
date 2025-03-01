<?php
namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserInvitation;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Modules\User\Models\UserProfile;
use Cloudinary\Cloudinary;
use App\Models\Booking;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user::index');
    }

    public function profile()
    {
       
        return view('user::pages.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
    public function showRegistrationForm(Request $request)
    {
        $token = $request->query('token');
        if (!$token) {
            return redirect('/')->with('error', 'Invalid token');
        }
    
        $email = explode('|', base64_decode($token))[0];
        
        return view('user::pages.complete_registration', compact('email', 'token'));
    }
    
    public function register(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
               'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'phone' => 'required|numeric|digits:10',
            ]);
    
            // Store booking in the database
            $booking = Booking::create($validated);
    
           
    
            return redirect('/')->with('success', 'Your profile details sent to admin successfully!');
        }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Mail\BookingNotification;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Store booking in the database
        $booking = Booking::create($validated);

        // Ensure OWNER_EMAIL is set correctly in .env and is a valid email
        $ownerEmail = env('MAIL_USERNAME'); 

        // Send the email to the owner
        if ($ownerEmail) {
            Mail::to($ownerEmail)->send(new BookingNotification($booking));
        } else {
            // Handle missing email in .env
            return redirect('/')->with('error', 'Owner email address is not configured.');
        }

        return redirect('/')->with('success', 'Your room booking request was sent successfully!');
    }
}

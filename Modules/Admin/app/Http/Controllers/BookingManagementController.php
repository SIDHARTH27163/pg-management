<?php

namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Modules\Admin\Models\AllottedBooking;
use Modules\Admin\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Mail;
class BookingManagementController extends Controller
{
    public function approve_booking(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'room_id' => 'required|exists:rooms,id',
            'checkin_date' => 'required|date',
            'price' => 'required|numeric',
        ]);

        // Fetch the booking
        $booking = Booking::findOrFail($request->booking_id);
        // print_r($booking->phone);
        // die;
        $avatar = 'https://ui-avatars.com/api/?name=' . urlencode($booking->name) . '&background=random&size=128';
        // Create or find the user, using the phone number as the password
        $user = User::firstOrCreate(
            ['email' => $booking->email], // Unique identifier (email)
            [
                'name' => $booking->name,
                'uuid' => Str::uuid(),
                'password' => bcrypt($booking->phone), // Use the phone number as the password
                'phone_no' => $booking->phone, // Assuming a 'phone' column exists in the 'users' table
                'avatar' => $avatar,
                'acc_type' => 'tenant' // Explicitly set account type
            ]
        );
        
        Mail::to($user->email)->send(new UserCreatedMail($user));
        
        // Update booking status to 'approved'
        $booking->update(['status' => 'approved']);

        // Create a record in the allotted_bookings table
        AllottedBooking::create([
            'room_id' => $request->room_id,
            'user_id' => $user->id,
            'payment_id' => $booking->payment_id ?? null,
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date ?? null,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Booking approved and allotted successfully.');
    }
    public function change_booking_status($id)
    {
        // Fetch the report
        $booking = Booking::findOrFail($id);
    
        // Toggle status (assuming you have a 'status' column)
        $booking->status = $booking->status === 'not-approved' ? 'approved' : 'not-approved';
        $booking->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }
    public function delete_booking($id)
    {
        // Find the booking
        $booking = Booking::find($id);

        // Check if booking exists
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        // Delete the booking
        $booking->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Booking deleted successfully.');
    }

}

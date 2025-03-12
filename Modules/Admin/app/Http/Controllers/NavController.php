<?php

namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Models\Room;
use Modules\Admin\Models\RoomFeature;
use Modules\Admin\Models\RoomRule;
use Modules\Admin\Models\RoomImage;
use Modules\Admin\Models\RoomsGallery;
use Modules\Admin\Models\AllottedBooking;
use App\Models\Booking;
use App\Models\User;
use Modules\User\Models\Report;
class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function RoomManagement()
    {
        // Fetch all rooms with associated data and count of current tenants
        $rooms = Room::with([
            'features',
            'rules',
            'cover_images',
            'gallery_images',
            'allottedBookings' // Ensure correct relationship name
        ])->withCount([
            'allottedBookings as current_tenants' => function ($query) {
                $query->whereNull('checkout_date'); // Count only active tenants
            }
        ])->get();
    
        return view('admin::RoomManagement.index', compact('rooms'));
    }
    

    
    public function UserManagement()
    {
        $users = User::where('acc_type', 'tenant')
                                   ->orderBy('created_at', 'desc') // Order by creation date in descending order
                                   ->get();   
        

    
                                      
        // return view('admin::Booking_Payment.index', compact('approvedBookings', 'notApprovedBookings' , 'rooms'));
        return view('admin::UserManagement.index' , compact('users'));
    }
    public function Booking_PaymentManagement()
    {
        
        $approvedBookings = Booking::where('status', 'approved')
                                   ->orderBy('created_at', 'desc') // Order by creation date in descending order
                                   ->paginate(10);   
        
        $notApprovedBookings = Booking::where('status', 'not-approved')
                                      ->orderBy('created_at', 'desc') // Order by creation date in descending order
                                      ->paginate(10);
    
                                      $rooms = Room::all();
        return view('admin::Booking_Payment.index', compact('approvedBookings', 'notApprovedBookings' , 'rooms'));
    }
    
    
    public function PaymentsManagement()
    {
        return view('admin::Payments.index');
    }
    public function ownerManagement()
    {
        return view('admin::owner.index');
    }
    public function RoomReportsManagement()
    {
        
        $rooms = Room::withCount(['allottedBookings as current_tenants' => function ($query) {
            $query->whereNull('checkout_date'); // Only count active tenants
        }])->get();
        $reports = AllottedBooking::with(['room', 'user'])->get();
       
      
        return view('admin::Reports.index'  ,  compact('reports' , 'rooms'));
    }
    public function deleteBooking($bookingId)
{
        // Fetch the booking by its primary key
        $booking = AllottedBooking::findOrFail($bookingId);
        $room = Room::find($booking->room_id); // Find the associated room

        // Delete the user associated with this booking
        // User::where('id', $booking->user_id)->delete();

        // Delete the booking entry
        $booking->delete();


        return redirect()->back()->with('success', 'Booking deleted successfully. Now Delete User');
    }
    public function UserReportsManagement()
    {
        $reports = Report::all();
        return view('admin::Reports.user-reports'  ,  compact('reports'));
    }
    public function NotificationsManagement()
    {
        return view('admin::Notifications.index');
    }
    public function SettingsManagement()
    {
        return view('admin::Settings.index');
    }
    public function change_report_status($id)
    {
        // Fetch the report
        $report = Report::findOrFail($id);
    
        // Toggle status (assuming you have a 'status' column)
        $report->status = $report->status === 'pending' ? 'approved' : 'pending';
        $report->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Report status updated successfully.');
    }
    
   
}

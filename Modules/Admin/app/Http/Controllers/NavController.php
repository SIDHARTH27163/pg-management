<?php

namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Models\Room;
use Modules\Admin\Models\RoomFeature;
use Modules\Admin\Models\RoomRule;
use Modules\Admin\Models\RoomImage;
use Modules\Admin\Models\RoomsGallery;
use App\Models\Booking;
class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function RoomManagement()
    {
        // Fetch all rooms with their associated data
        $rooms = Room::with(['features', 'rules', 'cover_images', 'gallery_images'])->get();
        
        // Pass the data to the view
        return view('admin::RoomManagement.index', compact('rooms'));
    }
    
    public function UserManagement()
    {
        return view('admin::UserManagement.index');
    }
    public function Booking_PaymentManagement()
    {
        
        $approvedBookings = Booking::where('status', 'approved')
                                   ->orderBy('created_at', 'desc') // Order by creation date in descending order
                                   ->paginate(10);   
        
        $notApprovedBookings = Booking::where('status', 'not-approved')
                                      ->orderBy('created_at', 'desc') // Order by creation date in descending order
                                      ->paginate(10);
    
        
        return view('admin::Booking_Payment.index', compact('approvedBookings', 'notApprovedBookings'));
    }
    
    
    public function PaymentsManagement()
    {
        return view('admin::Payments.index');
    }
    public function ownerManagement()
    {
        return view('admin::owner.index');
    }
    public function ReportsManagement()
    {
        return view('admin::Reports.index');
    }
    public function NotificationsManagement()
    {
        return view('admin::Notifications.index');
    }
    public function SettingsManagement()
    {
        return view('admin::Settings.index');
    }

   
}

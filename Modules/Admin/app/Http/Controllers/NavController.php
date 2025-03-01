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
use App\Models\User;
use Modules\User\Models\Report;
class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function RoomManagement()
    {
        // Fetch all rooms with their associated data
        $rooms = Room::with(['features', 'rules', 'cover_images', 'gallery_images'])->get();
        // Fetch rooms for dropdown

        // Pass the data to the view
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
    public function ReportsManagement()
    {
        $reports = Report::all();
        return view('admin::Reports.index'  ,  compact('reports'));
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

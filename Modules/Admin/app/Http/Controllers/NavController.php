<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function RoomManagement()
    {
        return view('admin::RoomManagement.index');
    }
    public function UserManagement()
    {
        return view('admin::UserManagement.index');
    }
    public function Booking_PaymentManagement()
    {
        return view('admin::Booking_Payment.index');
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

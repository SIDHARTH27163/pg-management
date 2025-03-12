<?php

// In modules/Admin/routes/web.php
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\NavController;
use Modules\Admin\Http\Controllers\RoomFeatureController;
use Modules\Admin\Http\Controllers\RoomController;
use Modules\Admin\Http\Controllers\RoomRuleController;
use Modules\Admin\Http\Controllers\RoomImageController;
use Modules\Admin\Http\Controllers\PageController;
use Modules\Admin\Http\Controllers\BookingManagementController;
use Modules\Admin\Http\Controllers\TransactionController;
use App\Http\Middleware\RoleBasedRedirect;


/*
|----------------------------------------------------------------------
| Admin Routes
|----------------------------------------------------------------------
*/
Route::middleware(['auth', RoleBasedRedirect::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/room-management', [NavController::class, 'RoomManagement'])->name('room-management');
        Route::get('/user_management', [NavController::class, 'UserManagement'])->name('user_management');
        Route::put('/report/{id}' ,[NavController::class, 'change_report_status'])->name('report_status');
        Route::get('/booking-management', [NavController::class, 'Booking_PaymentManagement'])->name('booking-management');
        Route::get('/roomreports', [NavController::class, 'RoomReportsManagement'])->name('roomreports');
        Route::get('/userreports', [NavController::class, 'UserReportsManagement'])->name('userreports');
        Route::delete('/delete_alloted_booking/{bookingId}', [NavController::class, 'deleteBooking'])->name('delete_alloted_booking');
        Route::get('/settings', [NavController::class, 'SettingsManagement'])->name('settings');
        Route::resource('/manage-rooms', RoomController::class);
        Route::resource('/manage-room-features', RoomFeatureController::class);
        Route::resource('/manage-room-rules', RoomRuleController::class);
        Route::resource('/manage-room-images', RoomImageController::class);
        Route::resource('/pages', PageController::class);
        Route::post('/bookings/approve', [BookingManagementController::class, 'approve_booking'])->name('approve.booking');
        Route::put('/change_booking_status/{id}',[BookingManagementController::class, 'change_booking_status'])->name('change_booking_status');
        Route::delete('/booking/{id}', [BookingController::class, 'delete_booking'])->name('delete_booking');
        

        // Add other admin routes here
        Route::post('/send-invite', [AdminController::class, 'sendInvite'])->name('send_invite');

        Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('transactions/store', [TransactionController::class, 'store'])->name('transactions.store');
    Route::delete('transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

    });

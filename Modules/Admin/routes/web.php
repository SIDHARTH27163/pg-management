<?php

// In modules/Admin/routes/web.php
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\NavController;
use Modules\Admin\Http\Controllers\RoomFeatureController;
use Modules\Admin\Http\Controllers\RoomController;
use Modules\Admin\Http\Controllers\RoomRuleController;
use Modules\Admin\Http\Controllers\RoomImageController;
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
        Route::resource('/manage-rooms', RoomController::class);
        Route::resource('/manage-room-features', RoomFeatureController::class);
        Route::resource('/manage-room-rules', RoomRuleController::class);
        Route::resource('/manage-room-images', RoomImageController::class);
        // Add other admin routes here
    });

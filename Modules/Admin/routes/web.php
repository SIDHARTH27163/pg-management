<?php

// In modules/Admin/routes/web.php
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use App\Http\Middleware\RoleBasedRedirect;
/*
|----------------------------------------------------------------------
| Admin Routes
|----------------------------------------------------------------------
*/

Route::middleware(['auth' , RoleBasedRedirect::class])->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard'); // Correct route name

});

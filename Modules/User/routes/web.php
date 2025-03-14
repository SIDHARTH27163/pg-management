<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;
use Modules\User\Http\Controllers\profileController;
use Modules\User\Http\Controllers\ReportController;

use App\Http\Middleware\RoleBasedRedirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified', RoleBasedRedirect::class])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::resource('dashboard', UserController::class);
        // Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('userprofile', [UserController::class , 'profile'])->name('userprofile');
        Route::post('/user-profile', [profileController::class, 'store'])->name('profile.store');
        Route::resource('report', ReportController::class);
        // Route::get('/invitation', [UserController::class, 'showRegistrationForm'])->name('invitation');
        // Route::post('/invitaion', [UserController::class, 'invitation']);
});
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/invitation', [UserController::class, 'showRegistrationForm'])->name('invitation');
    Route::post('/invitation', [UserController::class, 'register']);
});

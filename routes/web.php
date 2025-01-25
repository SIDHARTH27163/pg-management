<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleBasedRedirect;
use App\Http\Controllers\BookingController;

// use Modules\Admin\Models\Page;
Route::get('/', function () {
    return view('welcome');
});
// root routes'
Route::get('/rooms' , [HomeController::class , 'rooms']);
Route::get('/view-room/{id}', [HomeController::class, 'view_room']);

Route::get('/gallery' , [HomeController::class , 'Gallery']);
// root routes ends
// Route::get('/{slug}', function ($slug) {
//     $page = Page::where('slug', $slug)->firstOrFail();
//     return view('pages.dynamic', compact('page'));
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', RoleBasedRedirect::class])->name('dashboard');

Route::middleware('auth' , RoleBasedRedirect::class , EnsureTokenIsValid::class)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// room  bookin functionality
Route::post('/book-room', [BookingController::class, 'store'])->name('book.room');

require __DIR__.'/auth.php';

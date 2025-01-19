<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Modules\Admin\Models\Room;

class HomeController extends Controller
{
    /**
     * Display the rooms page .
     */
    public function rooms(Request $request): View
    {
        $rooms = Room::with('cover_images')->paginate(9); // Eager load the 'image' relation and fetch 9 rooms per page
       return view('rooms.index', compact('rooms'));

    }
    public function view_room($id)
    {
        // Retrieve the room by ID
        $room = Room::with(['features', 'rules', 'cover_images', 'gallery_images'])->find($id);

        // Check if the room exists
        if (!$room) {
            abort(404, 'Room not found.');
        }

        // Pass the room data to the view
        return view('rooms.view', compact('room'));
    }
    
    /**
     * Display the gallery page .
     */
    public function Gallery(Request $request): View
    {
        return view('rooms.gallery');
    }

    
}

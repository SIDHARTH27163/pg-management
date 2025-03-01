<?php

namespace Modules\Admin\Http\Controllers;
use Modules\Admin\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();

        // Pass the room data to the view
        return view('admin::Room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::Room.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    

    public function store(Request $request)
    {
        try{
        $validated = $request->validate([
            'room_type' => 'required|string',
            'number_of_tenants' => 'required|integer|min:1',
            'bathroom' => 'required|boolean',
            'balconies' => 'required|boolean',
            'capacity' => 'required|integer|min:1',
            'rent' => 'required|numeric|min:0',
            'additional_charges' => 'required|string',
            'description' => 'required|string',
        ]);

        Room::create($validated);
        return redirect()->back()->with('success', 'Room created successfully.');
    } catch (\Exception $e) {
        \Log::error('Content Settings Update Error', ['error' => $e->getMessage()]);
         dd($e->getMessage());
        return redirect()->back()->withErrors('Failed to update settings. Please try again.');
    }
    }

    /**
     * Show the specified resource.
     */
    public function show(Room $room)
    {
        return view('admin::Room.index', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
  
     public function dis_approve_room($id)
     {
        
         
     }
     

    public function update(Request $request, $id)
    {
        try{
        $room = Room::findOrFail($id);

        $validated = $request->validate([
            'room_type' => 'required|string',
            'number_of_tenants' => 'required|integer|min:1',
            'bathroom' => 'required|boolean',
            'balconies' => 'required|boolean',
            'capacity' => 'required|integer|min:1',
            'rent' => 'required|numeric|min:0',
            'additional_charges' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $room->update($validated);
        return redirect()->route('admin.manage-rooms.index')->with('success', 'Room updated successfully.');
    } catch (\Exception $e) {
        \Log::error('Content Settings Update Error', ['error' => $e->getMessage()]);
         dd($e->getMessage());
        return redirect()->back()->withErrors('Failed to update settings. Please try again.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.manage-rooms.index')->with('success', 'Room deleted successfully.');
    }
}

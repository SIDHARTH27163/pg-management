<?php

namespace Modules\Admin\Http\Controllers;
use Modules\Admin\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Models\RoomFeature;

class RoomFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('features')->get(); // Fetch all rooms with their features
        $features=RoomFeature::all();
        return view('admin::Room.feature', compact('rooms' , 'features'));
    }

 
    public function store(Request $request)
{
    try {
        // Validate input
        $request->validate([
            'room_id' => 'required|exists:rooms,id', // Ensure the selected room exists
            'feature' => 'required|string|max:255',
        ]);

        // Create a new RoomFeature
        RoomFeature::create([
            'room_id' => $request->room_id, // Store the selected room ID
            'feature' => $request->feature,
        ]);

        return redirect()->back()->with('success', 'Feature added successfully.');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Handle model not found exception
            dd($e);
        die;
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Handle validation exception
        dd($e);
        die;
    } catch (\Exception $e) {
        // Handle any other exceptions
        return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again.'])->withInput();
    }
}


    /**
     * Show the form for editing the specified feature.
     */
    public function edit($id)
    {
        $feature = RoomFeature::findOrFail($id); // Fetch the feature by ID
        $rooms = Room::all(); // Fetch all rooms to display in the dropdown
        return view('admin::Room.feature', compact('feature', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'room_id' => 'required|exists:rooms,id', // Validate the room selection
                'feature' => 'required|string|max:255',
            ]);
    
            // Find the RoomFeature record by ID or throw an exception
            $feature = RoomFeature::findOrFail($id);
    
            // Update the record
            $feature->update([
                'room_id' => $request->room_id,
                'feature' => $request->feature,
            ]);
    
            // Redirect with success message
            return redirect()->route('admin.manage-room-features.index')->with('success', 'Feature updated successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // If the RoomFeature is not found
            dd($e);
            die;
        } catch (\Illuminate\Validation\ValidationException $e) {
            // If validation fails
            dd($e);
            die;
        } catch (\Exception $e) {
            // For any other exceptions
            dd($e);
            die;
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feature = RoomFeature::findOrFail($id);
        $feature->delete();

        return redirect()->back()->with('success', 'Feature deleted successfully.');
    }
}

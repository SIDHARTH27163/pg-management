<?php

namespace Modules\Admin\Http\Controllers;
use Modules\Admin\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Models\RoomRule;

class RoomRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('rules')->get(); // Fetch all rooms with their features
        $rules=RoomRule::all();
        return view('admin::Room.rules', compact('rooms' , 'rules'));
    }

 
    public function store(Request $request)
{
    try {
        // Validate input
        $request->validate([
            'room_id' => 'required|exists:rooms,id', // Ensure the selected room exists
            'rule' => 'required|string|max:255',
        ]);

        // Create a new RoomFeature
        RoomRule::create([
            'room_id' => $request->room_id, // Store the selected room ID
            'rule' => $request->rule,
        ]);

        return redirect()->back()->with('success', 'Room Rule added successfully.');
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
        $rule = RoomRule::findOrFail($id); // Fetch the rule by ID
        $rooms = Room::all(); // Fetch all rooms to display in the dropdown
        return view('admin::Room.rules', compact('rule', 'rooms'));
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
                'rule' => 'required|string|max:255',
            ]);
    
            // Find the RoomFeature record by ID or throw an exception
            $rule = RoomRule::findOrFail($id);
    
            // Update the record
            $rule->update([
                'room_id' => $request->room_id,
                'rule' => $request->rule,
            ]);
    
            // Redirect with success message
            return redirect()->route('admin.manage-room-rules.index')->with('success', 'Rule updated successfully.');
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
        $rule = RoomRule::findOrFail($id);
        $rule->delete();

        return redirect()->back()->with('success', 'Room Rule deleted successfully.');
    }
}

<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin::Room.index');
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
        $validated = $request->validate([
            'room_type' => 'required|string|max:255',
            'number_of_rooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'balconies' => 'nullable|integer',
            'capacity' => 'required|integer',
            'availability' => 'required|boolean',
            'rent' => 'required|numeric',
            'additional_charges' => 'nullable|numeric',
            'description' => 'required|string',
        ]);

        Room::create($validated);

        return redirect()->route('admin.manage-rooms')->with('success', 'Room created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}

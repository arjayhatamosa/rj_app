<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of rooms and cottages.
     */
    public function index()
    {
        $rooms = Room::latest()->get();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new room/cottage.
     */
    public function create()
    {
        $types = [
            'Room',
            'Cottage'
        ];

        return view('rooms.create', compact('types'));
    }

    /**
     * Store a newly created room/cottage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'type' => 'required|in:Room,Cottage',

            'description' => 'nullable|string',

            'price' => 'required|numeric|min:0',

            'capacity' => 'required|integer|min:1',

            'status' => 'required|in:Available,Occupied,Maintenance',
        ]);

        Room::create($validated);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room/Cottage successfully added.');
    }

    /**
     * Display the specified room/cottage.
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified room/cottage.
     */
    public function edit(Room $room)
    {
        $types = [
            'Room',
            'Cottage'
        ];

        return view('rooms.edit', compact('room', 'types'));
    }

    /**
     * Update the specified room/cottage.
     */
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'type' => 'required|in:Room,Cottage',

            'description' => 'nullable|string',

            'price' => 'required|numeric|min:0',

            'capacity' => 'required|integer|min:1',

            'status' => 'required|in:Available,Occupied,Maintenance',
        ]);

        $room->update($validated);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room/Cottage successfully updated.');
    }

    /**
     * Remove the specified room/cottage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room/Cottage successfully deleted.');
    }
}
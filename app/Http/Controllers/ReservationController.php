<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReservationController extends Controller
{
    /**
     * Display all reservations.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'room'])
            ->latest()
            ->get();

        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a reservation.
     */
    public function create()
    {
        $users = User::orderBy('name')->get();

        $rooms = Room::where('status', 'Available')
            ->orderBy('name')
            ->get();

        return view('reservations.create', compact('users', 'rooms'));
    }

    /**
     * Store a new reservation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $room = Room::findOrFail($validated['room_id']);

        // Prevent reservation of rooms/cottages under maintenance.
        if ($room->status === 'Maintenance') {
            return back()
                ->withInput()
                ->withErrors([
                    'room_id' => 'This room/cottage is currently under maintenance.'
                ]);
        }

        // Check if the room/cottage already has a conflicting reservation.
        $hasConflict = Reservation::where('room_id', $validated['room_id'])
            ->whereIn('status', ['Pending', 'Confirmed'])
            ->where(function ($query) use ($validated) {
                $query->where('check_in', '<', $validated['check_out'])
                    ->where('check_out', '>', $validated['check_in']);
            })
            ->exists();

        if ($hasConflict) {
            return back()
                ->withInput()
                ->withErrors([
                    'room_id' => 'This room/cottage is already reserved for the selected dates.'
                ]);
        }

        // Calculate number of nights.
        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = Carbon::parse($validated['check_out']);

        $nights = $checkIn->diffInDays($checkOut);

        // Calculate total amount.
        $totalAmount = $room->price * $nights;

        Reservation::create([
            'user_id' => $validated['user_id'],
            'room_id' => $validated['room_id'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'guests' => $validated['guests'],
            'total_amount' => $totalAmount,
            'status' => 'Pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reservation successfully created.');
    }

    /**
     * Display a specific reservation.
     */
    public function show(Reservation $reservation)
    {
        $reservation->load(['user', 'room']);

        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing a reservation.
     */
    public function edit(Reservation $reservation)
    {
        $users = User::orderBy('name')->get();

        $rooms = Room::orderBy('name')->get();

        return view('reservations.edit', compact(
            'reservation',
            'users',
            'rooms'
        ));
    }

    /**
     * Update a reservation.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
            'status' => 'required|in:Pending,Confirmed,Cancelled,Completed',
            'notes' => 'nullable|string',
        ]);

        $room = Room::findOrFail($validated['room_id']);

        // Prevent reservation of rooms/cottages under maintenance.
        if ($room->status === 'Maintenance') {
            return back()
                ->withInput()
                ->withErrors([
                    'room_id' => 'This room/cottage is currently under maintenance.'
                ]);
        }

        // Check for conflicting reservations.
        $hasConflict = Reservation::where('room_id', $validated['room_id'])
            ->where('id', '!=', $reservation->id)
            ->whereIn('status', ['Pending', 'Confirmed'])
            ->where(function ($query) use ($validated) {
                $query->where('check_in', '<', $validated['check_out'])
                    ->where('check_out', '>', $validated['check_in']);
            })
            ->exists();

        if ($hasConflict) {
            return back()
                ->withInput()
                ->withErrors([
                    'room_id' => 'This room/cottage is already reserved for the selected dates.'
                ]);
        }

        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = Carbon::parse($validated['check_out']);

        $nights = $checkIn->diffInDays($checkOut);

        $totalAmount = $room->price * $nights;

        $reservation->update([
            'user_id' => $validated['user_id'],
            'room_id' => $validated['room_id'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'guests' => $validated['guests'],
            'total_amount' => $totalAmount,
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reservation successfully updated.');
    }

    /**
     * Delete a reservation.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reservation successfully deleted.');
    }
}
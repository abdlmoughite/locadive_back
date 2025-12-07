<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display all reservations
     */
    public function index()
    {
        return response()->json(
            Reservation::with(['client', 'voiture'])->get(),
            200
        );
    }

    /**
     * Store a new reservation
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id'   => 'required|exists:clients,id',
            'voiture_id'  => 'required|exists:voitures,id',
            'date_debut'  => 'required|date',
            'date_fin'    => 'required|date|after_or_equal:date_debut',
            'img_etat'    => 'nullable|string',
            'prix'        => 'required|numeric',
            'contrat'     => 'nullable|string',
            'status'      => 'required|string',
            'prix_total'  => 'required|numeric',
        ]);

        $reservation = Reservation::create($request->all());

        return response()->json([
            'message'     => 'Reservation created successfully',
            'reservation' => $reservation
        ], 201);
    }

    /**
     * Display one reservation
     */
    public function show($id)
    {
        $reservation = Reservation::with(['client', 'voiture', 'reservationFin'])
            ->find($id);

        if (!$reservation) {
            return response()->json(['error' => 'Reservation not found'], 404);
        }

        return response()->json($reservation, 200);
    }

    /**
     * Update a reservation
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['error' => 'Reservation not found'], 404);
        }

        $request->validate([
            'date_debut'  => 'sometimes|date',
            'date_fin'    => 'sometimes|date|after_or_equal:date_debut',
            'img_etat'    => 'sometimes|string',
            'prix'        => 'sometimes|numeric',
            'contrat'     => 'sometimes|string',
            'status'      => 'sometimes|string',
            'prix_total'  => 'sometimes|numeric',
        ]);

        $reservation->update($request->all());

        return response()->json([
            'message'     => 'Reservation updated successfully',
            'reservation' => $reservation
        ], 200);
    }

    /**
     * Delete a reservation
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['error' => 'Reservation not found'], 404);
        }

        $reservation->delete();

        return response()->json([
            'message' => 'Reservation deleted successfully'
        ], 200);
    }
}

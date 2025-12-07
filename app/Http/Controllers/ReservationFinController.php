<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReservationFin;
use Illuminate\Http\Request;

class ReservationFinController extends Controller
{
    /**
     * Display all reservation finish records
     */
    public function index()
    {
        return response()->json(
            ReservationFin::with('reservation')->get(),
            200
        );
    }

    /**
     * Store new reservation finalization
     */
    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'dommages'       => 'nullable|string',
            'km_fin'         => 'required|integer',
            'km_total'       => 'required|integer',
            'status_payee'   => 'required|boolean'
        ]);

        // Prevent duplicate record for same reservation
        if (ReservationFin::where('reservation_id', $request->reservation_id)->exists()) {
            return response()->json([
                'error' => 'Reservation already finalized'
            ], 400);
        }

        $data = ReservationFin::create($request->all());

        return response()->json([
            'message' => 'Reservation finalized successfully',
            'data'    => $data
        ], 201);
    }

    /**
     * Show one finish record
     */
    public function show($id)
    {
        $finish = ReservationFin::with('reservation')->find($id);

        if (!$finish) {
            return response()->json(['error' => 'ReservationFin not found'], 404);
        }

        return response()->json($finish, 200);
    }

    /**
     * Update reservation end details
     */
    public function update(Request $request, $id)
    {
        $finish = ReservationFin::find($id);

        if (!$finish) {
            return response()->json(['error' => 'ReservationFin not found'], 404);
        }

        $request->validate([
            'dommages'     => 'sometimes|string',
            'km_fin'       => 'sometimes|integer',
            'km_total'     => 'sometimes|integer',
            'status_payee' => 'sometimes|boolean'
        ]);

        $finish->update($request->all());

        return response()->json([
            'message' => 'ReservationFin updated successfully',
            'data'    => $finish
        ], 200);
    }

    /**
     * Delete reservation finish record
     */
    public function destroy($id)
    {
        $finish = ReservationFin::find($id);

        if (!$finish) {
            return response()->json(['error' => 'ReservationFin not found'], 404);
        }

        $finish->delete();

        return response()->json([
            'message' => 'ReservationFin deleted successfully'
        ], 200);
    }
}

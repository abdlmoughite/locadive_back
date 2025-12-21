<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display all cars
     */
    public function index()
    {
        return response()->json(
            Voiture::with('agency')->get(),
            200
        );
    }

        public function getByAgency($id)
{
    return response()->json(
        Voiture::where('agency_id', $id)->get(),
        200
    );
}

    /**
     * Store a new car
     */
    public function store(Request $request)
    {
        $request->validate([
            'agency_id'   => 'required|exists:agencies,id',
            'model'       => 'required|string',
            'annee'       => 'required|integer',
            'etat'        => 'required|string',
            'matricule'   => 'required|string|unique:voitures',
            'color'       => 'required|string',
            'description' => 'nullable|string',
            'options'     => 'nullable|string',
            'prix_jour'   => 'required|numeric',
            'assurance'   => 'nullable|string',
            'carte_grise' => 'nullable|string',
            'img'         => 'nullable|string',
            'status'      => 'required|string',
            'km_debut'    => 'required|integer'
        ]);

        $voiture = Voiture::create($request->all());

        return response()->json([
            'message' => 'Voiture created successfully',
            'voiture' => $voiture
        ], 201);
    }

    /**
     * Show one car
     */
    public function show($id)
    {
        $voiture = Voiture::with(['agency', 'reservations', 'preparations'])
            ->find($id);

        if (!$voiture) {
            return response()->json(['error' => 'Voiture not found'], 404);
        }

        return response()->json($voiture, 200);
    }

    /**
     * Update car
     */
    public function update(Request $request, $id)
    {
        $voiture = Voiture::find($id);

        if (!$voiture) {
            return response()->json(['error' => 'Voiture not found'], 404);
        }

        $request->validate([
            'model'       => 'sometimes|string',
            'annee'       => 'sometimes|integer',
            'etat'        => 'sometimes|string',
            'matricule'   => 'sometimes|string|unique:voitures,matricule,' . $voiture->id,
            'color'       => 'sometimes|string',
            'description' => 'sometimes|string',
            'options'     => 'sometimes|string',
            'prix_jour'   => 'sometimes|numeric',
            'assurance'   => 'sometimes|string',
            'carte_grise' => 'sometimes|string',
            'img'         => 'sometimes|string',
            'status'      => 'sometimes|string',
            'km_debut'    => 'sometimes|integer'
        ]);

        $voiture->update($request->all());

        return response()->json([
            'message' => 'Voiture updated successfully',
            'voiture' => $voiture
        ], 200);
    }

    /**
     * Delete car
     */
    public function destroy($id)
    {
        $voiture = Voiture::find($id);

        if (!$voiture) {
            return response()->json(['error' => 'Voiture not found'], 404);
        }

        $voiture->delete();

        return response()->json([
            'message' => 'Voiture deleted successfully'
        ], 200);
    }
}

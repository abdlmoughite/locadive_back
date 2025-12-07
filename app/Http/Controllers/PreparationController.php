<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Preparation;
use Illuminate\Http\Request;

class PreparationController extends Controller
{
    /**
     * Display all preparations
     */
    public function index()
    {
        return response()->json(
            Preparation::with('voiture')->get(),
            200
        );
    }

    /**
     * Store a new preparation
     */
    public function store(Request $request)
    {
        $request->validate([
            'voiture_id'  => 'required|exists:voitures,id',
            'type'        => 'required|string',
            'date_debut'  => 'required|date',
            'date_fin'    => 'nullable|date',
            'commentaire' => 'nullable|string'
        ]);

        $preparation = Preparation::create($request->all());

        return response()->json([
            'message'     => 'Preparation created successfully',
            'preparation' => $preparation
        ], 201);
    }

    /**
     * Show one preparation
     */
    public function show($id)
    {
        $preparation = Preparation::with('voiture')->find($id);

        if (!$preparation) {
            return response()->json(['error' => 'Preparation not found'], 404);
        }

        return response()->json($preparation, 200);
    }

    /**
     * Update preparation
     */
    public function update(Request $request, $id)
    {
        $preparation = Preparation::find($id);

        if (!$preparation) {
            return response()->json(['error' => 'Preparation not found'], 404);
        }

        $request->validate([
            'type'        => 'sometimes|string',
            'date_debut'  => 'sometimes|date',
            'date_fin'    => 'sometimes|date',
            'commentaire' => 'sometimes|string'
        ]);

        $preparation->update($request->all());

        return response()->json([
            'message'     => 'Preparation updated successfully',
            'preparation' => $preparation
        ], 200);
    }

    /**
     * Delete a preparation
     */
    public function destroy($id)
    {
        $preparation = Preparation::find($id);

        if (!$preparation) {
            return response()->json(['error' => 'Preparation not found'], 404);
        }

        $preparation->delete();

        return response()->json([
            'message' => 'Preparation deleted successfully'
        ], 200);
    }
}

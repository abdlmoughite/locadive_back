<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Depense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display all depenses
     */
    public function index()
    {
        return response()->json(
            Depense::with('agency')->get(),
            200
        );
    }

    /**
     * Store a new depense
     */
    public function store(Request $request)
    {
        $request->validate([
            'agency_id'   => 'required|exists:agencies,id',
            'type'        => 'required|string',
            'montant'     => 'required|numeric',
            'date'        => 'required|date',
            'commentaire' => 'nullable|string',
        ]);

        $depense = Depense::create($request->all());

        return response()->json([
            'message' => 'Depense created successfully',
            'depense' => $depense
        ], 201);
    }
    public function getdepenses($idAgency)
    {
        $depenses = Depense::where('agency_id', $idAgency)->with('agency')->get();

        return response()->json($depenses, 200);
    }

    /**
     * Show a specific depense
     */
    public function show($id)
    {
        $depense = Depense::with('agency')->find($id);

        if (!$depense) {
            return response()->json(['error' => 'Depense not found'], 404);
        }

        return response()->json($depense, 200);
    }

    /**
     * Update a depense
     */
    public function update(Request $request, $id)
    {
        $depense = Depense::find($id);

        if (!$depense) {
            return response()->json(['error' => 'Depense not found'], 404);
        }

        $request->validate([
            'type'        => 'sometimes|string',
            'montant'     => 'sometimes|numeric',
            'date'        => 'sometimes|date',
            'commentaire' => 'sometimes|string',
        ]);

        $depense->update($request->all());

        return response()->json([
            'message' => 'Depense updated successfully',
            'depense' => $depense
        ], 200);
    }

    /**
     * Delete a depense
     */
    public function destroy($id)
    {
        $depense = Depense::find($id);

        if (!$depense) {
            return response()->json(['error' => 'Depense not found'], 404);
        }

        $depense->delete();

        return response()->json([
            'message' => 'Depense deleted successfully'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgencyController extends Controller
{
    /**
     * Display all agencies
     */
    public function index()
    {
        return response()->json(Agency::all(), 200);
    }

    /**
     * Store a new agency
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'      => 'required|string',
            'adresse'  => 'required|string',
            'tele'     => 'required|string',
            'email'    => 'required|email|unique:agencies',
            'password' => 'required|min:6',
        ]);

        $agency = Agency::create([
            'nom'      => $request->nom,
            'adresse'  => $request->adresse,
            'tele'     => $request->tele,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Agency created successfully',
            'agency'  => $agency,
        ], 201);
    }

    /**
     * Display one agency
     */
    public function show($id)
    {
        $agency = Agency::find($id);

        if (!$agency) {
            return response()->json(['error' => 'Agency not found'], 404);
        }

        return response()->json($agency, 200);
    }

    /**
     * Update agency
     */
    public function update(Request $request, $id)
    {
        $agency = Agency::find($id);

        if (!$agency) {
            return response()->json(['error' => 'Agency not found'], 404);
        }

        $request->validate([
            'nom'      => 'sometimes|string',
            'adresse'  => 'sometimes|string',
            'tele'     => 'sometimes|string',
            'email'    => 'sometimes|email|unique:agencies,email,' . $agency->id,
            'password' => 'sometimes|min:6',
        ]);

        $agency->update([
            'nom'      => $request->nom      ?? $agency->nom,
            'adresse'  => $request->adresse  ?? $agency->adresse,
            'tele'     => $request->tele     ?? $agency->tele,
            'email'    => $request->email    ?? $agency->email,
            'password' => $request->password ? Hash::make($request->password) : $agency->password,
        ]);

        return response()->json([
            'message' => 'Agency updated successfully',
            'agency'  => $agency,
        ], 200);
    }

    /**
     * Delete agency
     */
    public function destroy($id)
    {
        $agency = Agency::find($id);

        if (!$agency) {
            return response()->json(['error' => 'Agency not found'], 404);
        }

        $agency->delete();

        return response()->json([
            'message' => 'Agency deleted successfully'
        ], 200);
    }
}

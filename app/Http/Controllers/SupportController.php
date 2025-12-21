<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupportController extends Controller
{
    /**
     * Display all supports
     */
    public function index()
    {
        return response()->json(
            Support::with('agency')->get(),
            200
        );
    }

    /**
     * Store a new support
     */
    public function store(Request $request)
    {
        $request->validate([
            'agency_id' => 'required|exists:agencies,id',
            'nom'       => 'required|string',
            'prenom'    => 'required|string',
            'cin'       => 'required|string|unique:supports',
            'salaire'   => 'required|numeric',
            'email'     => 'required|email|unique:supports',
            'password'  => 'required|min:6',
        ]);

        $support = Support::create([
            'agency_id' => $request->agency_id,
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'cin'       => $request->cin,
            'salaire'   => $request->salaire,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Support created successfully',
            'support' => $support
        ], 201);
    }

    /**
     * Show one support
     */
    public function show($id)
    {
        $support = Support::with('agency')->find($id);

        if (!$support) {
            return response()->json(['error' => 'Support not found'], 404);
        }

        return response()->json($support, 200);
    }

    /**
     * Update support
     */
    public function update(Request $request, $id)
    {
        $support = Support::find($id);

        if (!$support) {
            return response()->json(['error' => 'Support not found'], 404);
        }

        $request->validate([
            'nom'       => 'sometimes|string',
            'prenom'    => 'sometimes|string',
            'cin'       => 'sometimes|string|unique:supports,cin,' . $support->id,
            'salaire'   => 'sometimes|numeric',
            'email'     => 'sometimes|email|unique:supports,email,' . $support->id,
            'password'  => 'sometimes|min:6',
        ]);

        $support->update([
            'nom'       => $request->nom ?? $support->nom,
            'prenom'    => $request->prenom ?? $support->prenom,
            'cin'       => $request->cin ?? $support->cin,
            'salaire'   => $request->salaire ?? $support->salaire,
            'email'     => $request->email ?? $support->email,
            'password'  => $request->password ? Hash::make($request->password) : $support->password,
        ]);

        return response()->json([
            'message' => 'Support updated successfully',
            'support' => $support
        ], 200);
    }

    /**
     * Delete support
     */
    public function destroy($id)
    {
        $support = Support::find($id);

        if (!$support) {
            return response()->json(['error' => 'Support not found'], 404);
        }

        $support->delete();

        return response()->json([
            'message' => 'Support deleted successfully'
        ], 200);
    }
}

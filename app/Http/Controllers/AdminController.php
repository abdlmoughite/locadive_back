<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display all admins
     */
    public function index()
    {
        return response()->json(Admin::all(), 200);
    }

    /**
     * Store new admin
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'       => 'required|string',
            'prenom'    => 'required|string',
            'email'     => 'required|email|unique:admins',
            'password'  => 'required|min:6',
        ]);

        $admin = Admin::create([
            'nom'      => $request->nom,
            'prenom'   => $request->prenom,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Admin created successfully',
            'admin'   => $admin
        ], 201);
    }

    /**
     * Show one admin
     */
    public function show($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['error' => 'Admin not found'], 404);
        }

        return response()->json($admin, 200);
    }

    /**
     * Update admin
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['error' => 'Admin not found'], 404);
        }

        $request->validate([
            'nom'       => 'sometimes|string',
            'prenom'    => 'sometimes|string',
            'email'     => 'sometimes|email|unique:admins,email,' . $admin->id,
            'password'  => 'sometimes|min:6',
        ]);

        $admin->update([
            'nom'      => $request->nom ?? $admin->nom,
            'prenom'   => $request->prenom ?? $admin->prenom,
            'email'    => $request->email ?? $admin->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
        ]);

        return response()->json([
            'message' => 'Admin updated successfully',
            'admin'   => $admin
        ], 200);
    }

    /**
     * Delete admin
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['error' => 'Admin not found'], 404);
        }

        $admin->delete();

        return response()->json([
            'message' => 'Admin deleted successfully'
        ], 200);
    }
}

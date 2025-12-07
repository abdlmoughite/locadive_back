<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blacklist;
use App\Models\Client;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    /**
     * Display all blacklist entries
     */
    public function index()
    {
        return response()->json(
            Blacklist::with('client')->get(),
            200
        );
    }

    /**
     * Add client to blacklist
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id'   => 'required|exists:clients,id',
            'score'       => 'required|integer|min:0|max:100',
            'commentaire' => 'nullable|string'
        ]);

        // Prevent duplicates
        if (Blacklist::where('client_id', $request->client_id)->exists()) {
            return response()->json([
                'error' => 'Client already in blacklist'
            ], 400);
        }

        $entry = Blacklist::create($request->all());

        return response()->json([
            'message' => 'Client added to blacklist',
            'data'    => $entry
        ], 201);
    }

    /**
     * Show the blacklist record for a client
     */
    public function show($id)
    {
        $entry = Blacklist::with('client')
            ->where('id', $id)
            ->first();

        if (!$entry) {
            return response()->json(['error' => 'Blacklist record not found'], 404);
        }

        return response()->json($entry, 200);
    }

    /**
     * Update blacklist entry
     */
    public function update(Request $request, $id)
    {
        $entry = Blacklist::find($id);

        if (!$entry) {
            return response()->json(['error' => 'Blacklist record not found'], 404);
        }

        $request->validate([
            'score'       => 'sometimes|integer|min:0|max:100',
            'commentaire' => 'sometimes|string'
        ]);

        $entry->update($request->all());

        return response()->json([
            'message' => 'Blacklist updated successfully',
            'data'    => $entry
        ], 200);
    }

    /**
     * Remove client from blacklist
     */
    public function destroy($id)
    {
        $entry = Blacklist::find($id);

        if (!$entry) {
            return response()->json(['error' => 'Blacklist entry not found'], 404);
        }

        $entry->delete();

        return response()->json([
            'message' => 'Client removed from blacklist'
        ], 200);
    }
}

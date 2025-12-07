<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display all clients
     */
    public function index()
    {
        return response()->json(
            Client::with(['agency', 'blacklist'])->get(),
            200
        );
    }

    /**
     * Store a new client
     */
    public function store(Request $request)
    {
        $request->validate([
            'agency_id'  => 'required|exists:agencies,id',
            'nom'        => 'required|string',
            'prenom'     => 'required|string',
            'cin'        => 'required|string|unique:clients',
            'permis'     => 'required|string',
            'tele'       => 'required|string',
            'img_cin'    => 'nullable|string',
            'img_permis' => 'nullable|string',
        ]);

        $client = Client::create($request->all());

        return response()->json([
            'message' => 'Client created successfully',
            'client'  => $client
        ], 201);
    }

    /**
     * Display one client
     */
    public function show($id)
    {
        $client = Client::with(['agency', 'blacklist', 'reservations'])
            ->find($id);

        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return response()->json($client, 200);
    }

    /**
     * Update client
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        $request->validate([
            'agency_id'  => 'sometimes|exists:agencies,id',
            'nom'        => 'sometimes|string',
            'prenom'     => 'sometimes|string',
            'cin'        => 'sometimes|string|unique:clients,cin,' . $client->id,
            'permis'     => 'sometimes|string',
            'tele'       => 'sometimes|string',
            'img_cin'    => 'sometimes|string',
            'img_permis' => 'sometimes|string',
        ]);

        $client->update($request->all());

        return response()->json([
            'message' => 'Client updated successfully',
            'client'  => $client
        ], 200);
    }

    /**
     * Delete client
     */
    public function destroy($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        $client->delete();

        return response()->json([
            'message' => 'Client deleted successfully'
        ], 200);
    }
}

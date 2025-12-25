<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display all clients
     */
    public function index($id)
    {
        return response()->json(
            Client::where('agency_id' , $id )->get(),
            200
        );
    }

    public function getByAgency($id)
{
    return response()->json(
        Client::where('agency_id', $id)->get(),
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
            'scoring'    => 'nullable|integer',
            'face2_prime'=> 'nullable|string',
            'face2_cin'  => 'nullable|string',
            'comment_scoring' => 'nullable|string',
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
        public function show($cin)
        {
            $client = Client::where('cin', $cin)->first();

            if (!$client) {
                return response()->json([
                    'error' => 'Client not found'
                ], 404);
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

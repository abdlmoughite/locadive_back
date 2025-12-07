<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Agency;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {

        switch($request->role) {
            case 'admin':
                $admin = Admin::create([
                    'nom'  => $request->nom,
                    'prenom' => $request->prenom,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                return response()->json([
                    'message' => 'User registered successfully',
                    'user'    => $admin,
                ]);
            case 'agence':
                $agence = Agency::create([
                    'nom'  => $request->nom,
                    'adresse' => $request->adresse,
                    'tele'=> $request->tele,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                return response()->json([
                    'message' => 'User registered successfully',
                    'user'    => $agence,
                ]);
            case 'support':
                $Support = Support::create([
                    'nom'  => $request->nom,
                    'prenom' => $request->prenom,
                    'cin' => $request->cin,
                    'img_cin' => $request->img_cin,
                    'salaire' => $request->salaire,
                    'agency_id'=> $request->agency_id,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                return response()->json([
                    'message' => 'User registered successfully',
                    'user'    => $Support,
                ]);
            default:
                return response()->json([
                    'message' => 'User erreur',
                ]);
    }

    }

    // LOGIN
    public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required'
    ]);

    // 1) Try Admin Login
    $admin = Admin::where('email', $request->email)->first();
    if ($admin && Hash::check($request->password, $admin->password)) {

        $token = $admin->createToken("ADMIN_TOKEN")->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'role'    => 'admin',
            'token'   => $token,
            'user'    => $admin
        ]);
    }

    // 2) Try Agency Login
    $agency = Agency::where('email', $request->email)->first();
    if ($agency && Hash::check($request->password, $agency->password)) {

        $token = $agency->createToken("AGENCY_TOKEN")->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'role'    => 'agence',
            'token'   => $token,
            'user'    => $agency
        ]);
    }

    // 3) Try Support Login
    $support = Support::where('email', $request->email)->first();
    if ($support && Hash::check($request->password, $support->password)) {

        $token = $support->createToken("SUPPORT_TOKEN")->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'role'    => 'support',
            'token'   => $token,
            'user'    => $support
        ]);
    }

    // If no match found
    return response()->json([
        'error' => 'Email or password incorrect'
    ], 401);
}

    // LOGOUT
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    // GET CURRENT USER
    public function user(Request $request)
    {
        return $request->user();
    }
}

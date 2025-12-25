<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\BlacklistController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\PreparationController;
use App\Http\Controllers\ReservationFinController;
use App\Http\Controllers\SupportController;


// ---------------------------
// PUBLIC ROUTES
// ---------------------------

Route::post('/login',    [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// ---------------------------
// PROTECTED ROUTES (SANCTUM)
// ---------------------------

Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin only (if needed, add middleware role:admin)
    Route::apiResource('admins', AdminController::class);

    // Agencies
    Route::apiResource('agencies', AgencyController::class);

    // Supports
    Route::apiResource('supports', SupportController::class);

    // Clients
    Route::apiResource('clients', ClientController::class);
    Route::get('/clients/agency/{id}', [ClientController::class, 'getByAgency']);


    // Cars
    Route::apiResource('voitures', VoitureController::class);
    Route::get('/voitures/agency/{id}', [VoitureController::class, 'getByAgency']);


    // Reservations
    Route::apiResource('reservations', ReservationController::class);
    Route::get('/reservations/agency/{idAgency}', [ReservationController::class , 'getreservation']) ;

    // Reservation Final (km, dommages…)
    Route::apiResource('reservation-fins', ReservationFinController::class);

    // Blacklist
    Route::apiResource('blacklists', BlacklistController::class);

    // Dépenses
    Route::apiResource('depenses', DepenseController::class);
    Route::get('/depenses/agency/{idAgency}', [DepenseController::class , 'getdepenses']) ;

    // Préparations
    Route::apiResource('preparations', PreparationController::class);
    Route::get('/preparations/agency/{idAgency}', [PreparationController::class , 'getpreparations']);
});

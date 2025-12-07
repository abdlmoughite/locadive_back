<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AgencyController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\VoitureController;
use App\Http\Controllers\Api\BlacklistController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\DepenseController;
use App\Http\Controllers\Api\PreparationController;
use App\Http\Controllers\Api\ReservationFinController;
use App\Http\Controllers\Api\SupportController;


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

    // Cars
    Route::apiResource('voitures', VoitureController::class);

    // Reservations
    Route::apiResource('reservations', ReservationController::class);

    // Reservation Final (km, dommages…)
    Route::apiResource('reservation-fins', ReservationFinController::class);

    // Blacklist
    Route::apiResource('blacklists', BlacklistController::class);

    // Dépenses
    Route::apiResource('depenses', DepenseController::class);

    // Préparations
    Route::apiResource('preparations', PreparationController::class);
});

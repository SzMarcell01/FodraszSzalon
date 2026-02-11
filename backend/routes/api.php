<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

// Nyilvános útvonalak
Route::get('services', [ServiceController::class, 'index']);
Route::get('workers', [WorkerController::class, 'index']);
Route::get('users', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Védett útvonalak (Csak bejelentkezve)
Route::middleware('auth:sanctum')->group(function () {
    // Ez az egy sor kell csak a user adatokhoz:
    Route::get('/user-data', [AuthController::class, 'userData']);
    
    // Ide jöhetnek majd a későbbi védett dolgok (pl. profil frissítés)
});

Route::middleware('auth:sanctum')->post('/user/update-image', [AuthController::class, 'updateProfileImage']);
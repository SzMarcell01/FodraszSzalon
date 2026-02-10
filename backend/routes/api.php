<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('services', App\Http\Controllers\ServiceController::class)->only(['index']);
Route::apiResource('workers', App\Http\Controllers\WorkerController::class)->only(['index']);

Route::apiResource('users', App\Http\Controllers\Api\AuthController::class)->only(['index']);

// Adjunk neki nevet ->name('login')
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->get('/user-data', function () {
    return response()->json(['message' => 'Sikeresen lekérted a belső adatokat az API-n keresztül!']);
});
<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServiceController as ApiServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Nyilvános útvonalak
Route::get('users', [AuthController::class, 'index']);

Route::post('/login', [AuthController::class, 'login'])->name('login');

// Védett útvonalak (Csak bejelentkezve)
// routes/api.php javított verzió
Route::middleware('auth:sanctum')->group(function () {
    // Használd a Controllerben lévő metódust, az tisztább
    Route::get('/user-data', [AuthController::class, 'userData']); 

    Route::get('/services', [ApiServiceController::class, 'index']);
    Route::post('/user/services/sync', [ApiServiceController::class, 'sync']);
    Route::post('/user/update-image', [AuthController::class, 'updateProfileImage']);
});

Route::apiResource('comments', \App\Http\Controllers\CommentController::class)->only(['index']);
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User; // Fontos beimportálni a modellt!
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return UserResource::collection(User::all());
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Keressük meg a felhasználót manuálisan az email alapján
        $user = User::where('email', $request->email)->first();

        // Ellenőrizzük a jelszót
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hibás adatok!'
            ], 401);
        }

        // Itt már a PHP tudja, hogy a $user egy User példány, 
        // amin rajta van a createToken() metódus.
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'user' => $user
        ], 200);
    }
}
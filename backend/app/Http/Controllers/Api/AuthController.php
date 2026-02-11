<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User; // Fontos beimportálni a modellt!
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function index()
    {
        //return UserResource::collection(User::all());
        return UserResource::collection(User::with('services')->get());
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

    public function userData(Request $request)
    {
        // A middleware már azonosította a júzert a token alapján, 
        // így a $request->user() tartalmazza a teljes User objektumot.
        return response()->json([
            'status' => 'success',
            'message' => 'Sikeres betöltés',
            'user' => $request->user() 
        ], 200);
    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $user = $request->user();
    
        if ($request->hasFile('image')) {
            
            // 1. RÉGI KÉP TÖRLÉSE
            if ($user->image_url) {
                // Átalakítjuk az URL-t elérési úttá: "/storage/avatars/abc.jpg" -> "avatars/abc.jpg"
                $relativeStoragePath = str_replace('/storage/', '', $user->image_url);
                
                // Ellenőrizzük, hogy létezik-e a fájl, mielőtt töröljük
                if (Storage::disk('public')->exists($relativeStoragePath)) {
                    Storage::disk('public')->delete($relativeStoragePath);
                }
            }
    
            // 2. ÚJ KÉP MENTÉSE
            $path = $request->file('image')->store('avatars', 'public');
    
            // 3. ADATBÁZIS FRISSÍTÉSE
            $user->update([
                'image_url' => '/storage/' . $path
            ]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Profilkép sikeresen frissítve!',
                'image_url' => $user->image_url
            ]);
        }
    }
}
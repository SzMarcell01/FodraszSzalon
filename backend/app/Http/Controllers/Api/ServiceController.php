<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    // EZ HIÁNYZOTT:
    public function index()
    {
        return response()->json(service::all());
    }

    public function sync(Request $request)
    {
        $request->validate([
            'service_ids' => 'required|array',
            'service_ids.*' => 'exists:services,id',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user(); 
        
        $user->services()->sync($request->service_ids);

        return response()->json([
            'message' => 'Szolgáltatások sikeresen frissítve!',
            'services' => $user->services()->get()
        ]);
    }
}
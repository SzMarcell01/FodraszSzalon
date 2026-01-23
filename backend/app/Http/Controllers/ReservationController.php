<?php

namespace App\Http\Controllers;

use App\Mail\ReservationCreated;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'reservationDateTime' => 'required|date',
            'duration' => 'required|integer|min:1|max:8',
        ]);

        $reservation = Reservation::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'reservation_date_time' => $data['reservationDateTime'],
            'duration' => $data['duration'],
        ]);

        // Email küldése
        Mail::to($data['email'])->send(new ReservationCreated($reservation));

        return response()->json(['message' => 'Foglalás sikeres!']);
    }
}

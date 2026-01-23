<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
{
    return $this->subject('Foglalás visszaigazolás')
                ->html(view('emails.reservation.created_html', [
                    'first_name' => $this->reservation->first_name,
                    'last_name' => $this->reservation->last_name,
                    'reservation_date_time' => $this->reservation->reservation_date_time,
                    'duration' => $this->reservation->duration,
                    'phone' => $this->reservation->phone,
                ])->render());
}

}

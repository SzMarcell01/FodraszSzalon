@component('mail::message')
# Új foglalás

**Név:** {{ $reservation['firstName'] }} {{ $reservation['lastName'] }}

**Email:** {{ $reservation['email'] }}

**Telefon:** {{ $reservation['phone'] }}

**Dátum:** {{ $reservation['reservationDateTime'] }}

**Időtartam:** {{ $reservation['duration'] }} óra

@endcomponent

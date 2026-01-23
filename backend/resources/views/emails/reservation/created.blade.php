@component('mail::message')
# Foglalás visszaigazolás

Kedves {{ $reservation->first_name }} {{ $reservation->last_name }},

Sikeresen lefoglaltad az időpontot:

- **Dátum és idő:** {{ $reservation->reservation_date_time }}
- **Időtartam:** {{ $reservation->duration }} óra
- **Telefonszám:** {{ $reservation->phone }}

Köszönjük, hogy minket választottál!

@endcomponent

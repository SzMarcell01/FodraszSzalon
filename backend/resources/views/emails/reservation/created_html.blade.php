<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foglalás visszaigazolás</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f3f4f6; color: #1f2937; margin:0; padding:0; }
    .container { max-width:600px; margin:40px auto; background:#fff; padding:20px 30px; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1); }
    h1 { color:#2563eb; }
    p { line-height:1.6; }
    ul { list-style:none; padding:0; }
    li { margin-bottom:8px; }
    .footer { margin-top:20px; font-size:0.9rem; color:#6b7280; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Foglalás visszaigazolás 🎉</h1>
    <p>Kedves <strong>{{ $first_name }} {{ $last_name }}</strong>,</p>
    <p>Sikeresen lefoglaltad az időpontot:</p>
    <ul>
      <li><strong>Dátum és idő:</strong> {{ $reservation_date_time }}</li>
      <li><strong>Időtartam:</strong> {{ $duration }} óra</li>
      <li><strong>Telefonszám:</strong> {{ $phone }}</li>
    </ul>
    <p>Köszönjük, hogy minket választottál!</p>
    <p class="footer">Ez az üzenet automatikusan lett generálva, kérjük, ne válaszolj rá.</p>
  </div>
</body>
</html>

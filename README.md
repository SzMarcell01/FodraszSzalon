# FodraszSzalon

php artisan serve --host=0.0.0.0 --port=8000

PHP CACHE TÖRLÉSE: 

php artisan config:clear
php artisan cache:clear


TESZT:

PS C:\Users\deakl\FodraszSzalon\backend> php artisan tinker
>>
Psy Shell v0.12.18 (PHP 8.2.12 — cli) by Justin Hileman
New PHP manual is available (latest: 3.0.1). Update with `doc --update-manual`
> Mail::raw('Teszt email működik!', function ($msg) {
.     $msg->to('tesztfodrasz@gmail.com')
.         ->subject('Laravel email teszt');
. });
= Illuminate\Mail\SentMessage {#5277}

>

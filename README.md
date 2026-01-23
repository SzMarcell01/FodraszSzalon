# FodraszSzalon

Ez a projekt egy fodrász szalon foglalási rendszere Laravel + Vue.js alapokon.  
A backend Laravel API-t használ, a frontend Vue 3 és Vite.

---

## Telepítés

### Backend (Laravel) telepítése

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
```

### Backend (Laravel) telepítése

```bash
cd frontend
npm install
```

### Adatbázis beállítás

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fodraszszalon
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tesztfodrasz@gmail.com
MAIL_PASSWORD=qyehfqjipfrxtotp
MAIL_ENCRYPTION=tls

MAIL_FROM_ADDRESS=tesztfodrasz@gmail.com
MAIL_FROM_NAME="Teszt Fodrászat"
```

### Adatbázis beállítás

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fodraszszalon
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tesztfodrasz@gmail.com
MAIL_PASSWORD=qyehfqjipfrxtotp
MAIL_ENCRYPTION=tls

MAIL_FROM_ADDRESS=tesztfodrasz@gmail.com
MAIL_FROM_NAME="Teszt Fodrászat"

php artisan migrate
```

### Fejlesztés indítása (Laravel szerver:)

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

### Fejlesztés indítása (Vite frontend:)

```bash
cd frontend
npm run dev
```

### Gyakori parancsok

```bash
PHP cache törlése:

php artisan config:clear
php artisan cache:clear

Teszt email küldése:

php artisan tinker

php artisan tinker
>>> Mail::raw('Teszt email működik!', function ($msg) {
...     $msg->to('tesztfodrasz@gmail.com')
...         ->subject('Laravel email teszt');
... });
```

| Módszer | Endpoint          | Leírás                  |
| ------- | ----------------- | ----------------------- |
| POST    | /api/reservations | Új foglalás létrehozása |


{
  "firstName": "Kovács",
  "lastName": "János",
  "email": "teszt@pelda.hu",
  "phone": "06123456789",
  "reservationDateTime": "2026-01-25T10:30",
  "duration": 2
}

git merge branch neve

git push origin main
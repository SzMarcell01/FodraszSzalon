<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $users = [
        [
            'name' => 'Molnár Éva', 
            'email' => 'molnareva@teszt.hu', 
            'password' => bcrypt('password123'), 
            'image_url' => '/storage/avatars/kep1.jpg',
            'description' => 'Számomra a fodrászat nem csak munka, hanem alkotás. Szeretem, amikor a vendég a székből felállva magabiztosabbnak érzi magát, mint amikor leült. Legyen szó frissítésről vagy teljes megújulásról, mindig a hozzád illő stílust keresem.'
        ],
        [
            'name' => 'Fejes Anita', 
            'email' => 'fejesanita@teszt.hu', 
            'password' => bcrypt('password123'), 
            'image_url' => '/storage/avatars/kep2.jpg',
            'description' => 'Hiszek abban, hogy egy jó frizura nemcsak jól néz ki, hanem tükrözi a személyiségedet is. Precízen dolgozom, figyelek az apró részletekre, és fontos számomra, hogy a vendégeim elégedetten, mosolyogva távozzanak.'
        ],
        [
            'name' => 'Szántó Edit', 
            'email' => 'szantotedit@teszt.hu', 
            'password' => bcrypt('password123'), 
            'image_url' => '/storage/avatars/kep3.jpg',
            'description' => 'A természetes hatás és az időtálló frizurák állnak hozzám a legközelebb. Szeretem az egyedi megoldásokat, és mindig arra törekszem, hogy a frizura a mindennapokban is könnyen kezelhető legyen.'
        ],
        [
            'name' => 'Admin User', 
            'email' => 'admin@teszt.hu', 
            'password' => bcrypt('password123'), 
            'image_url' => '/storage/avatars/kep4.png', 
            'description' => 'Számomra a fodrászat nem csak munka, hanem alkotás. Szeretem, amikor a vendég a székből felállva magabiztosabbnak érzi magát, mint amikor leült. Legyen szó frissítésről vagy teljes megújulásról, mindig a hozzád illő stílust keresem.'
        ],
    ];

    foreach ($users as $user) {
        \App\Models\User::create($user);
    }
}
}

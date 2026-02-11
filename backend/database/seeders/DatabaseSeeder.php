<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\service; // Figyelj, nálad kisbetűs az osztálynév!

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Lefuttatjuk az alap seedereket
        $this->call([
            ServiceSeeder::class,
            UserSeeder::class,
        ]);
    
        // 2. Lekérjük az összes szolgáltatás ID-ját egy tömbbe
        $allServiceIds = \App\Models\service::pluck('id')->toArray();
    
        // 3. Minden felhasználóhoz hozzárendeljük az ÖSSZES szolgáltatást
        $users = \App\Models\User::all();
        foreach ($users as $user) {
            $user->services()->attach($allServiceIds);
        }
    }
}
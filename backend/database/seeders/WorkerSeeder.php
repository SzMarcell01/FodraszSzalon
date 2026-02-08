<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("workers")->insert(
            [
                [
                    'id'=> 1,
                    'name' => "Molnár Éva",
                    'description'=> "Számomra a fodrászat nem csak munka, hanem alkotás. Szeretem, amikor a vendég a székből felállva magabiztosabbnak érzi magát, mint amikor leült. Legyen szó frissítésről vagy teljes megújulásról, mindig a hozzád illő stílust keresem.",
                    'image_url' => '/storage/kep1.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id'=> 2,
                    'name' => "Fejes Anita",
                    'description' => "Hiszek abban, hogy egy jó frizura nemcsak jól néz ki, hanem tükrözi a személyiségedet is. Precízen dolgozom, figyelek az apró részletekre, és fontos számomra, hogy a vendégeim elégedetten, mosolyogva távozzanak.",
                    'image_url' => '/storage/kep2.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                
                ],
                [
                    'id'=> 3,
                    'name' => "Szántó Edit",
                    'description' => "A természetes hatás és az időtálló frizurák állnak hozzám a legközelebb. Szeretem az egyedi megoldásokat, és mindig arra törekszem, hogy a frizura a mindennapokban is könnyen kezelhető legyen.",
                    'image_url' => '/storage/kep3.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}

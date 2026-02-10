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
        ['name' => 'Admin User', 'email' => 'admin@teszt.hu', 'password' => bcrypt('password123')],
        ['name' => 'Kovács Anna', 'email' => 'anna@teszt.hu', 'password' => bcrypt('password123')],
        ['name' => 'Szabó Márk', 'email' => 'mark@teszt.hu', 'password' => bcrypt('password123')],
    ];

    foreach ($users as $user) {
        \App\Models\User::create($user);
    }
}
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("comments")->insert(
            [
                [
                    'id' => 1,
                    'rating' => 4.5,
                    'comment' => 'Nagyon elégedett vagyok a szolgáltatással!',
                    'user_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'rating' => 3.0,
                    'comment' => 'Átlagos élmény, semmi különös.',
                    'user_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 3,
                    'rating' => 5.0,
                    'comment' => 'Kiváló munka, nagyon ajánlom!',
                    'user_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}

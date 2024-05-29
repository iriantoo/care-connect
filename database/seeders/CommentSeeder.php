<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i < 10; $i++)
        {
            DB::table('comments')->insert([
                'user_id' => 1, // 'Test User
                'forum_id' => $i+1,
                'content' => $faker->paragraph,
            ]);
        }
    }
}

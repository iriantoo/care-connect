<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Forum;
use Faker\Factory as Faker;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i < 10; $i++)
        {
            DB::table('forums')->insert([
                'title' => $faker->sentence,
                'user_id' => 1, // 'Test User
                'description' => $faker->paragraph,
                'date_of_incident' => $faker->date,
                'time_of_incident' => $faker->time,
                'is_anonymous' => $faker->boolean,
                'is_confirmed' => $faker->boolean,
            ]);
        }
    }
}

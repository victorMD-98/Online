<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(30)->create();

        User::factory()->create([
            'name' => 'admin',
            'surname'=>'admin',
            'email' => 'admin@example.com',
            'password'=> Hash::make('password') 
        ]);

        User::factory()->create([
            'name' => 'utente',
            'surname'=>'utente',
            'email' => 'utente@example.com',
            'password'=> Hash::make('password') 
        ]);

        $this->call([
            PostSeeder::class,
            MediaSeeder::class,
            CommentSeeder::class,
            LikeSeeder::class,
            FollowerSeeder::class,
        ]);
    }
}

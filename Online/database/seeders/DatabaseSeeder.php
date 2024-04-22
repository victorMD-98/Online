<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'password'=> Hash::make('password'),
            'image'=>'https://source.unsplash.com/random/?person='.fake()->numberBetween(1,10),
            'background_img'=>'https://picsum.photos/200/300.jpg' 
        ]);

        User::factory()->create([
            'name' => 'utente',
            'surname'=>'utente',
            'email' => 'utente@example.com',
            'password'=> Hash::make('password'),
            'image'=>"default/avatar.png",
            'background_img'=>"default/sfondo.jpg" 
        ]);

        $this->call([
            

            FollowerSeeder::class,
        ]);
    }
}

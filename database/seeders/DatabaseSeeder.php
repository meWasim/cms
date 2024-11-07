<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Article::factory(100)->create();
        Category::factory(5)->create();


        // Create an Admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456789'), // Change to a secure password
            'role' => 'ADMIN',
        ]);

        // Create an Editor user
        User::factory()->create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => Hash::make('123456789'), // Change to a secure password
            'role' => 'EDITOR',
        ]);

        // Create a Guest user
        User::factory()->create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
            'password' => Hash::make('123456789'), // Change to a secure password
            'role' => 'USER',
        ]);
    }
}

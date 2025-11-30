<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // for ($i = 1; $i <= 5; $i++) {
        //     User::factory()->create([
        //         'name' => "User $i",
        //         'username' => "user$i",
        //         'email' => 'user' . $i . '@example.com',
        //         'password' => bcrypt('password'),
        //     ]);
        // }

        // Category::factory(2)->create();

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'nanda',
            'username' => 'nndaaa',
            'email' => 'nanda@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'rizky',
            'username' => 'rizky',
            'email' => 'rizky@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'maulana',
            'username' => 'maulana',
            'email' => 'maulana@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'kiki',
            'username' => 'kiki',
            'email' => 'kiki@example.com',
            'password' => Hash::make('password'),
        ]);

        Category::create([
            'name' => 'Teknologi',
        ]);
        Category::create([
            'name' => 'Makanan',
        ]);

        Post::factory(10)->recycle(User::all())->recycle(Category::all())->create();
    }
}
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        // Category::truncate();
        // Post::truncate();


        $user = User::factory()->create([
            'name' => 'Jeff Tocco'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);


        // $user = User::factory()->create();
        
        // $fourByFour = Category::create([
        //     'name' => '4x4',
        //     'slug' => '4x4'
        // ]);

        // $regular = Category::create([
        //     'name' => 'Regular Beach',
        //     'slug' => 'Regular Beach',
        // ]);

        // $handicap = Category::create([
        //     'name' => 'Handicap',
        //     'slug' => 'Handicap'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $fourByFour->id,
        //     'title' => 'Four By Four Post',
        //     'slug' => 'Four By Four Post',
        //     'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
        //     'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>"
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $handicap->id,
        //     'title' => 'Handicap Post',
        //     'slug' => 'Handicap Post',
        //     'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
        //     'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>"
        // ]);
    }
}


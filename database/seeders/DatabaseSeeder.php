<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(5)->create();

         Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
         ]);
         Category::create([
            'name' => 'Mobile Programming',
            'slug' => 'mobile-programming'
         ]);
         Category::create([
            'name' => 'Back End',
            'slug' => 'back-end'
         ]);
         Category::create([
            'name' => 'Front End',
            'slug' => 'front-end'
         ]);

         Post::factory(50)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

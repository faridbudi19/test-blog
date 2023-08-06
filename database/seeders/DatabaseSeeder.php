<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Membuat seed secara manual untuk send data ke db (alt lain dari tinker)
        User::create([
            'name' => 'Fergusso',
            'username' => 'fergusso',
            'email' => 'fergusso010@gmail.com',
            'password' => bcrypt('12345')
        ]);

        // User::create([
        //     'name' => 'Fernandes',
        //     'username' => 'fernandes',
        //     'email' => 'fernandez010@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // Membuat user otomatis secara random
        User::factory(5)->create();
        
        // seed category manual
        Category::create([
            'name' => 'Sport',
            'slug' => 'sport',
        ]);

        Category::create([
            'name' => 'Travel',
            'slug' => 'travel',
        ]);

        Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Category::create([
            'name' => 'Animal',
            'slug' => 'animal',
        ]);

        Category::create([
            'name' => 'Food',
            'slug' => 'food',
        ]);

        //Membuat article otomatis secara random
        Article::factory(30)->create();

        // Article::create([
        //     'title' => 'Judul 1',
        //     'slug' => 'judul-1',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptatum molestias ipsum perspiciatis dolor reprehenderit eum natus placeat fugiat in esse quidem vel nisi',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptatum molestias ipsum perspiciatis dolor reprehenderit eum natus placeat fugiat in esse quidem vel nisi laboriosam iure, saepe nulla nobis id exercitationem facere, harum ex numquam! Laboriosam ipsum laborum nostrum eligendi porro necessitatibus ullam unde officiis, ut deleniti, optio quo rem.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Article::create([
        //     'title' => 'Judul 2',
        //     'slug' => 'judul-2',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptatum molestias ipsum perspiciatis dolor reprehenderit eum natus placeat fugiat in esse quidem vel nisi',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptatum molestias ipsum perspiciatis dolor reprehenderit eum natus placeat fugiat in esse quidem vel nisi laboriosam iure, saepe nulla nobis id exercitationem facere, harum ex numquam! Laboriosam ipsum laborum nostrum eligendi porro necessitatibus ullam unde officiis, ut deleniti, optio quo rem.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Article::create([
        //     'title' => 'Judul 3',
        //     'slug' => 'judul-3',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptatum molestias ipsum perspiciatis dolor reprehenderit eum natus placeat fugiat in esse quidem vel nisi',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptatum molestias ipsum perspiciatis dolor reprehenderit eum natus placeat fugiat in esse quidem vel nisi laboriosam iure, saepe nulla nobis id exercitationem facere, harum ex numquam! Laboriosam ipsum laborum nostrum eligendi porro necessitatibus ullam unde officiis, ut deleniti, optio quo rem.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Article::create([
        //     'title' => 'Judul 4',
        //     'slug' => 'judul-4',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptatum molestias ipsum perspiciatis dolor reprehenderit eum natus placeat fugiat in esse quidem vel nisi',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptatum molestias ipsum perspiciatis dolor reprehenderit eum natus placeat fugiat in esse quidem vel nisi laboriosam iure, saepe nulla nobis id exercitationem facere, harum ex numquam! Laboriosam ipsum laborum nostrum eligendi porro necessitatibus ullam unde officiis, ut deleniti, optio quo rem.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}

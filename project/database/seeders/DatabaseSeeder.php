<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        echo "Создано 10 категорий" . "\n";

        Post::factory(10)->create();
        echo "Создано 10 постов" . "\n";
    }
}

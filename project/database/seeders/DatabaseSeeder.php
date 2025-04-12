<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = User::factory(1)->create();
        echo "Создано 1 админ - пользователь" . "\n";

        $categories = Category::factory(10)->create();
        echo "Создано 10 категорий" . "\n";

        $tags = Tag::factory(10)->create();
        echo "Создано 10 тегов" . "\n";

        $posts = Post::factory(10)->create();
        echo "Создано 10 постов" . "\n";

        foreach ($posts as $post) {
            $tagsIds = $tags->random(5)->pluck('id');

            $post->tags()->attach($tagsIds);
        }
        echo "Создано 10 связей posts_tags" . "\n";
    }
}

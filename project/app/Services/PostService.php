<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function store($data): Post
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return $post;
    }

    public function update($data, $post): Post
    {
        $tags = $data['tags'];
        unset($data['tags']);


        $post->update($data);
        $post->tags()->sync($tags);

        return $post;
    }
}

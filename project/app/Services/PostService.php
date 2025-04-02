<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function store($data): Post
    {
        $tags = $data['tags'] ?? null;
        unset($data['tags']);

        $post = Post::create($data);

        if (!is_null($tags)) {
            $post->tags()->attach($tags);
        } else {
            $post->tags()->detach();
        }

        return $post;
    }

    public function update($data, $post): Post
    {
        $tags = $data['tags'] ?? null;
        unset($data['tags']);

        $post->update($data);

        if (!is_null($tags)) {
            $post->tags()->sync($tags);
        } else {
            $post->tags()->detach();
        }

        return $post;
    }
}

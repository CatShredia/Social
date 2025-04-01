<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function store($data)
    {
        // $tags = $data['tag_ids'];
        // unset($data['tag_ids']);

        $post = Post::create($data);

        // $post->tags()->attach($tags);
    }

    public function update($data, $post)
    {
        // $tags = $data['tag_ids'];
        // unset($data['tag_ids']);


        $post->update($data);
        // $post->tags()->sync($tags);
    }
}

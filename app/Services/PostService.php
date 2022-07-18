<?php

namespace App\Services;

use App\Events\PostCreated;
use App\Models\Post;

class PostService extends AbstractService
{
    /**
     * Create Post
     *
     * @param $data
     * @return array
     */
    public function createPost($data): array
    {
        /** @var Post $post */
        $post = Post::create($data);
        PostCreated::dispatch($post);

        return $post->only('website_id', 'content');
    }
}

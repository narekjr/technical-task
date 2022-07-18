<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PostStoreRequest;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;

class PostController extends AbstractController
{
    /**
     * Store new post
     *
     * @param PostStoreRequest $request
     * @param PostService $postService
     * @return JsonResponse
     */
    public function store(PostStoreRequest $request, PostService $postService)
    {
        $post = $postService->createPost($request->validated());

        return $this->response('Post Created', $post);
    }
}

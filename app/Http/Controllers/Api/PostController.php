<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\IndexRequest;
use App\Http\Requests\Api\Post\StoreRequest;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        $posts = Post::filter($data)->get();
        return PostResource::collection($posts)->resolve();
    }
    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return PostResource::make($post)->resolve();
    }
    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return PostResource::make($post)->resolve();
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}

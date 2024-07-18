<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::all())->resolve();
    }
    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }
    public function store()
    {
        $data = $this->getData();
        $post = Post::create($data);
        return PostResource::make($post)->resolve();
    }
    public function update(Post $post)
    {
        $post->update(['title' => 'title 2']);
        return PostResource::make($post)->resolve();
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return Response::HTTP_NO_CONTENT;
    }
    private function getData() : array
    {
        return [
            'title' => 'some title',
            'content' => 'some content',
            'description' => 'some description',
            'image_path' => 'some image',
            'status' => 1,
            'author' => 'some author',
            'category' => 'some category',
            'tag' => 'some tag'
        ];
    }
}

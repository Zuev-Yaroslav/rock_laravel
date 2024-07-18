<?php

namespace App\Http\Controllers;

use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all())->resolve();
    }
    public function show(Comment $comment)
    {
        return CommentResource::make($comment)->resolve();
    }
    public function store()
    {
        $data = $this->getData();
        $comment = Comment::create($data);
        return CommentResource::make($comment)->resolve();
    }
    public function update(Comment $comment)
    {
        $comment->update(['content' => 'content 2']);
        return CommentResource::make($comment)->resolve();
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return Response::HTTP_NO_CONTENT;
    }
    private function getData() : array
    {
        return [
            'content' => 'blablablabla',
            'author' => 'Yaroslav',
            'likes' => 30
        ];
    }
}

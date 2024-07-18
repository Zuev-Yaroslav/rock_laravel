<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/post/comments' , [CommentController::class , 'index']);
Route::get('/post/comments/{comment}' , [CommentController::class , 'show']);
Route::post('/post/comments' , [CommentController::class , 'store']);
Route::patch('/post/comments/{comment}' , [CommentController::class , 'update']);
Route::delete('/post/comments/{comment}' , [CommentController::class , 'destroy']);

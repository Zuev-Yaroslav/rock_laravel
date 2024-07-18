<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('/posts' , [PostController::class , 'index']);
//Route::get('/posts/{post}' , [PostController::class , 'show']);
//Route::post('/posts' , [PostController::class , 'store']);
//Route::patch('/posts/{post}' , [PostController::class , 'update']);
//Route::delete('/posts/{post}' , [PostController::class , 'destroy']);

Route::apiResource('posts', PostController::class);
Route::apiResource('tags', TagController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('profiles', ProfileController::class);

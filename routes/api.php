<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Middleware\EntityModeratorMiddleware;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\PermissionMiddleware;
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

Route::group(['middleware' => ['jwt.auth', EntityModeratorMiddleware::class, PermissionMiddleware::class]], function () {
    Route::apiResource('posts', PostController::class);
    Route::apiResource('videos', VideoController::class);
    Route::apiResource('products', ProductController::class);
});
Route::apiResource('tags', TagController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('profiles', ProfileController::class)->middleware(['jwt.auth', IsAdminMiddleware::class]);
Route::apiResource('comments', CommentController::class);

Route::post('auth/login', [AuthController::class, 'login']);
Route::group(['middleware' => 'jwt.auth', 'prefix' => 'auth'], function ($router) {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

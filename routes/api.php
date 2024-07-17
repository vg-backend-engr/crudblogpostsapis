<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\API\UserController;
use App\Http\Middleware\TokenMiddleware;


Route::middleware('token')->group(function () {
    // Routes that require token validation

    // Routes for Blogs
    Route::get('blogs', [BlogController::class, 'index']);
    Route::post('blogs', [BlogController::class, 'store']);
    Route::get('blogs/{id}', [BlogController::class, 'show']);
    Route::put('blogs/{id}', [BlogController::class, 'update']);
    Route::delete('blogs/{id}', [BlogController::class, 'destroy']);

    // Routes for Posts under a Blog
    Route::get('blogs/{blog}/posts', [PostController::class, 'index']);
    Route::post('blogs/{blog}/posts', [PostController::class, 'store']);
    Route::get('blogs/{blog}/posts/{post}', [PostController::class, 'show']);
    Route::put('blogs/{blog}/posts/{post}', [PostController::class, 'update']);
    Route::delete('blogs/{blog}/posts/{post}', [PostController::class, 'destroy']);

    // Routes for Likes on Posts
    Route::post('posts/{post}/like', [LikeController::class, 'likePost']);
    Route::delete('posts/{post}/like', [LikeController::class, 'unlikePost']);

    // Routes for Comments on Posts
    Route::post('posts/{post}/comment', [CommentController::class, 'commentPost']);
    Route::put('comments/{comment}', [CommentController::class, 'update']);
    Route::delete('comments/{comment}', [CommentController::class, 'destroy']);
    
    // Database Seeder Route (also protected by token middleware)
    Route::get('seed', [BlogController::class, 'seedDatabase']);
});
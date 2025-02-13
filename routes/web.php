<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PageController::class, 'main']);

Route::get('/my-page', function () {
    return "Hello World";
});

Route::get('customer', [CustomerController::class, 'index']);
Route::get('posts', [PostController::class, 'post']);
Route::get('/posts/show/{post_id}/{title}', [PostController::class, 'show']);
Route::post('/posts/create', [PostController::class, 'create']);
Route::post('/posts/post-create', [PostController::class, 'store']);




<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my-page', function () {
    return "Hello World";
});

Route::get('customer', [CustomerController::class, 'index']);
Route::get('posts', [PostController::class, 'post']);
Route::get('/posts/show/{post_id}/{title}', [PostController::class, 'show']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/post-create', [PostController::class, 'store']);




<?php

use App\Http\Controllers\PostController;
use App\Http\Resources\PostCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Models\Post;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*Route::get('/products', function () {
    return view('products.index');
})->middleware('auth:sanctum');

Route::get('/products/show/{id}', function () {
    return view('products.show');
})->middleware('auth:sanctum');*/

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

Route::get('/posts', [PostController::class, 'index']); //->middleware('auth:basic')

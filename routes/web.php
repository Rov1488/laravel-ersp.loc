<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

    /*Доступные методы маршрутизатора
Маршрутизатор позволяет регистрировать маршруты, которые отвечают на любой HTTP-команду:
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);*/

Route::get('/', [\App\Http\Controllers\PageController::class, 'main']);

/*Route::get('/my-page', function () {
    return "Hello World";
});*/

Route::get('customer', [CustomerController::class, 'index']);
Route::get('posts', [PostController::class, 'index']);
Route::get('/posts/show/{post_id}/{title}', [PostController::class, 'show']);
//Route::get('/posts/create', [PostController::class, 'create']);
Route::addRoute(['GET', 'POST'], '/posts/create', [PostController::class, 'create']);
Route::post('/posts/post-create', [PostController::class, 'store']);

Route::resource('products', ProductController::class, ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);

//Route::redirect('/posts', '/posts/show/1/Hello-World', 301);





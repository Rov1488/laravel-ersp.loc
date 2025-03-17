<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Livewire\Counter;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/my-page', function () {
    return "Hello World";
});*/

Route::get('customer', [CustomerController::class, 'index']);
Route::get('posts', [PostController::class, 'index']);
//Параметры и внедрение зависимостей
Route::get('/posts/show/{post_id}/{title}', [PostController::class, 'show']);
//Необязательные параметры примеры
Route::get('/user/{name?}', function (?string $name = null) {
    return $name;
});
Route::get('/user/{name?}', function (?string $name = 'John') {
    return $name;
});
//Ограничения регулярных выражений
Route::get('/user/{name}', function (string $name) {
    return $name;
})->where('name', '[A-Za-z]+');

Route::get('/user/{id}', function (string $id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('/user/{id}', function (string $id) {
    return $id;
})->whereUuid('id');

Route::get('/category/{category}', function (string $category) {
    return $category;
})->whereIn('category', ['movie', 'song', 'painting']);



//Route::get('/posts/create', [PostController::class, 'create']);
Route::addRoute(['GET', 'POST'], '/posts/create', [PostController::class, 'create'])->block($lockSeconds = 10, $waitSeconds = 10);
Route::post('/posts/post-create', [PostController::class, 'store']);
//Route::resource('products', ProductController::class);
//Route with controller
Route::controller( ProductController::class)->group(function () {
    Route::get('products', 'index');
    Route::get('products/create', 'create');
    Route::post('products', 'store');
    Route::get('products/{id}', 'show');
    Route::get('products/edit/{id}', 'edit');
    Route::put('products/update/{id}', 'update');
    Route::delete('products/delete/{id}', 'destroy');
});

//HTTP Requests and HTTP Responses template
Route::get('test', [TestController::class, 'create'])->name('test');
Route::post('test', [TestController::class, 'create'])->name('test');
Route::get('/test-responses', [TestController::class, 'testResponses'])->name('test-responses');
Route::get('/test-page', [TestController::class, 'test'])->name('test-page');

Route::get('/counter', Counter::class);


//Middleware in Laravel
Route::get('/profile', function () {
    return "Profile checking with middleware";
})->middleware(EnsureTokenIsValid::class);

//Route::redirect('/posts', '/posts/show/1/Hello-World', 301);






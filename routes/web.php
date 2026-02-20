<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\OSGOPCalculatorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Livewire\Counter;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PracticController;

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

Route::get('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('authenticate', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('authenticate');
Route::get('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::get('register-store', [\App\Http\Controllers\AuthController::class, 'registerStore'])->name('register-store');
Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('pulse', function () {
    return view('pulse.dashboard');
})->name('pulse');

Route::get('customer', [CustomerController::class, 'index']);
Route::get('posts', [PostController::class, 'index']); //->middleware('auth:basic')  ->middleware('auth:basic') ->middleware('auth:sanctum')
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
Route::get('/practice', [TestController::class, 'practice'])->name('practice');
Route::get('/counter', Counter::class);


//Middleware in Laravel
Route::get('/profile', function () {
    return "Profile checking with middleware";
})->middleware(EnsureTokenIsValid::class);

Route::get('/excel-export', [ExportController::class, 'excelExport'])->name('excel-export');
Route::get('/excel-export-grok', [ExportController::class, 'excelExportGrok'])->name('excel-export-grok');

//Route::redirect('/posts', '/posts/show/1/Hello-World', 301);

Route::get('/metabase-dashboard', function () {
    $secretKey = env('METABASE_SECRET_KEY');
    $siteUrl = env('METABASE_SITE_URL');

    $payload = [
        'resource' => ['dashboard' => 2],
        'params' => (object)[],
        'exp' => now()->addMinutes(120)->timestamp
    ];

    $token = JWT::encode($payload, $secretKey, 'HS256');

    $iframeUrl = "$siteUrl/embed/dashboard/$token#bordered=false&titled=true";

    return view('metabase_dashboard', compact('iframeUrl'));
})->name('metabase-dashboard');

Route::get('/osgop-form', [OSGOPCalculatorController::class, 'showForm'])->name('osgop-form');
Route::any('/osgop-calculator', [OSGOPCalculatorController::class, 'calculate'])->name('osgop-calculate');

Route::any('/form-bk', function (){
    return view('napp-license.form-bk');
})->name('form-bk');

Route::get('/rating', function () {
    return view('rating.index');
})->name('rating');

Route::get('/rating-progress', function () {
    return view('rating.rating-progress');
})->name('rating-progress');

Route::get('/rating-progress-2', function () {
    return view('rating.rating-progress-2');
})->name('rating-progress-2');

Route::get('/rating-progress-3', function () {
    return view('rating.rating-progress-3');
})->name('rating-progress-3');

Route::get('/generate-pdf', [ExportController::class, 'generatePdf'])->name('generate-pdf');

Route::get('/vertical-tab', function(){
    return view('vertical-tab');
})->name('vertical-tab');

Route::get('/license', function(){
    return view('license');
})->name('license');

Route::get('/npk', function(){
    return view('npk.npk-index');
})->name('npk');

Route::get('/npk-chart', function(){
    return view('npk.npk-charts');
})->name('npk-chart');

Route::get('/docs-form', function(){
    return view('npk.docs-form');
})->name('docs-form');

Route::get('/form-test', function(){
    return view('npk.form-test');
})->name('form-test');

Route::get('/fin-block', function(){
    return view('npk.fin-block');
})->name('fin-block');

Route::get('/dopdocs-form', function(){
    return view('npk.dopdocs-form');
})->name('dopdocs-form');

Route::get('/offer-form', function(){
    return view('npk.offer-form');
})->name('offer-form');

Route::get('/ersp-dashboard', function(){
    return view('ersp-dashboard');
})->name('ersp-dashboard');

Route::get('/ersp-dashboard-2', function(){
    return view('ersp-dashboard2');
})->name('ersp-dashboard-2');

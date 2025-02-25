<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', function () {
    return view('products.index');
})->middleware('auth:sanctum');

Route::get('/products/show/{id}', function () {
    return view('products.show');
})->middleware('auth:sanctum');

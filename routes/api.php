<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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
Route::get('/posts', [PostController::class, 'index'])->name('posts'); //->middleware('auth:basic') middleware('auth:sanctum')
Route::get('/excel-export-grok', [ExportController::class, 'excelExportGrok'])->name('excel-export-grok');
Route::get('/excel-export-template', [ExportController::class, 'createUseExcelTemplate'])->name('excel-export-template');
Route::get('/excel-export-spreadsheet', [ExportController::class, 'createExcelSpreadsheet'])->name('excel-export-spreadsheet');

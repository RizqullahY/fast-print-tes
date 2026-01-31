<?php

declare(strict_types=1);
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');
Route::resource('product', ProductController::class);

Route::get('/category', function () {
    return view('pages.category.index');
});Route::get('/status', function () {
    return view('pages.status.index');
});
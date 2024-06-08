<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.home');
});

Route::get('products', function () {
    return view('Pages.products');
});

Route::get('product-detail', function () {
    return view('Pages.product_detail');
});

Route::get('sell-item', function () {
    return view('Pages.create_ad');
});

Route::get('store', function () {
    return view('Pages.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

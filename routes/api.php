<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [\App\Http\Controllers\Products::class, 'getProducts']);
Route::get('/cart', [\App\Http\Controllers\Cart::class, 'getCart']);
Route::post('/cart', [\App\Http\Controllers\Cart::class, 'addToCart']);

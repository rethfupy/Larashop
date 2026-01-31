<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('products')
    ->namespace('App\Http\Controllers\API\Product')
    ->group(function () {
        Route::get('/', IndexController::class);
    });
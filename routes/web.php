<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
    Route::middleware('guest:admin')->group(function() {
        Route::get('/login', \App\Http\Controllers\Admin\Auth\IndexController::class)->name('admin.login');
        Route::post('/login', \App\Http\Controllers\Admin\Auth\StoreController::class)->name('admin.login.store');
    });

    Route::post('/logout', \App\Http\Controllers\Admin\Auth\DestroyController::class)
        ->middleware('auth:admin')
        ->name('admin.logout');
});

Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

    Route::prefix('categories')
        ->namespace('\App\Http\Controllers\Category')
        ->group(function() {
            Route::get('/', IndexController::class)->name('category.index');
            Route::get('/create', CreateController::class)->name('category.create');
            Route::post('/', StoreController::class)->name('category.store');
            Route::get('/{category}/edit', EditController::class)->name('category.edit');
            Route::get('/{category}', ShowController::class)->name('category.show');
            Route::patch('/{category}', UpdateController::class)->name('category.update');
            Route::delete('/{category}', DeleteController::class)->name('category.delete');
        });

    Route::prefix('tags')
        ->namespace('\App\Http\Controllers\Tag')
        ->group(function() {
            Route::get('/', IndexController::class)->name('tag.index');
            Route::get('/create', CreateController::class)->name('tag.create');
            Route::post('/', StoreController::class)->name('tag.store');
            Route::get('/{tag}/edit', EditController::class)->name('tag.edit');
            Route::get('/{tag}', ShowController::class)->name('tag.show');
            Route::patch('/{tag}', UpdateController::class)->name('tag.update');
            Route::delete('/{tag}', DeleteController::class)->name('tag.delete');
        });

    Route::prefix('users')
        ->namespace('\App\Http\Controllers\User')
        ->group(function() {
            Route::get('/', IndexController::class)->name('user.index');
            Route::get('/create', CreateController::class)->name('user.create');
            Route::post('/', StoreController::class)->name('user.store');
            Route::get('/{user}/edit', EditController::class)->name('user.edit');
            Route::get('/{user}', ShowController::class)->name('user.show');
            Route::patch('/{user}', UpdateController::class)->name('user.update');
            Route::delete('/{user}', DeleteController::class)->name('user.delete');
        });

    Route::prefix('products')
        ->namespace('\App\Http\Controllers\Product')
        ->group(function() {
            Route::get('/', IndexController::class)->name('product.index');
            Route::get('/create', CreateController::class)->name('product.create');
            Route::post('/', StoreController::class)->name('product.store');
            Route::get('/{product}/edit', EditController::class)->name('product.edit');
            Route::get('/{product}', ShowController::class)->name('product.show');
            Route::patch('/{product}', UpdateController::class)->name('product.update');
            Route::delete('/{product}', DeleteController::class)->name('product.delete');
        });

    Route::prefix('orders')
        ->namespace('\App\Http\Controllers\Order')
        ->group(function() {
            Route::get('/', IndexController::class)->name('order.index');
            Route::get('/{order}/edit', EditController::class)->name('order.edit');
            Route::get('/{order}', ShowController::class)->name('order.show');
            Route::patch('/{order}', UpdateController::class)->name('order.update');
            Route::delete('/{order}', DeleteController::class)->name('order.delete');
        });
});

Route::get('{any}', App\Http\Controllers\Client\IndexController::class)
    ->where('any', '.*');
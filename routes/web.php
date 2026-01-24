<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
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
});

Route::get('{any}', App\Http\Controllers\Client\IndexController::class)
    ->where('any', '.*');
<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('posts')->as('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::post('/', [PostController::class, 'store'])->name('store');
    Route::get('/{id}', [PostController::class, 'show'])->name('show');
    Route::put('/{id}', [PostController::class, 'update'])->name('update');
});

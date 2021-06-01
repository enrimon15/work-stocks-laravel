<?php

//rotte per blog
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/blog')->group(function() {
    Route::get('/', [NewsController::Class, 'index'])->name('blogNews');
    Route::get('/{id}', [NewsController::class, 'show'])->name('newsById');
    Route::post('/comment', [NewsController::class, 'newsComment'])->name('newsComment');
    Route::post('/like', [NewsController::class, 'newsLike'])->name('newsLike');
    Route::get('/search/{query}', [NewsController::class, 'search'])->name('newsSearch');
});


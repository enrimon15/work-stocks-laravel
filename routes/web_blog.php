<?php

//rotte per blog
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/blog')->group(function() {
    Route::get('/', [NewsController::Class, 'index'])->name('blogNews');
    Route::get('/{id}', [NewsController::class, 'show'])->name('newsById');
    Route::post('/comment', [NewsController::class, 'newsComment'])->middleware('roleIn:user')->name('newsComment');
    Route::get('/comment-delete/{id}', [NewsController::class, 'newsCommentDelete'])->middleware('roleIn:user')->name('newsCommentDelete');
    Route::get('/like/{id}/{opType}', [NewsController::class, 'newsLike'])->middleware('roleIn:user')->name('newsLike');
    Route::get('/search/{query}', [NewsController::class, 'search'])->name('newsSearch');
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::prefix('/profile')->group(function () {
    Route::get('/cv/{idUser}', [ProfileController::class, 'downloadCv'])->name('profileCV');
    Route::get('/{type}/{id}', [ProfileController::class, 'index'])->name('profile');
});

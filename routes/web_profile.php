<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::prefix('/profile')->group(function () {
    Route::get('/{type}/{id}', [ProfileController::class, 'index'])->name('profile');
});

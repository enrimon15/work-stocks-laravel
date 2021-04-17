<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::prefix('/profile')->group(function () {
    Route::get('/{id}', [ProfileController::class, 'index'])->name('profile');
});

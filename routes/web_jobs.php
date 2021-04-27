<?php

//rotte per job catalog
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::prefix('/jobs')->group(function() {
    Route::get('/', [JobController::Class, 'jobCatalog'])->name('jobs/getAll');
    Route::get('/{id}', [JobController::class, 'getById'])->name('jobs/getById');
});


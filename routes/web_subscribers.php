<?php

//rotte per job catalog
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::prefix('/subscribers')->group(function() {
    Route::get('/', [SubscriberController::class, 'subscribersCatalog'])->name('subscribers/getAll');

    Route::get('/apply/{idJobOffer}',[SubscriberController::class, 'apply'])
        ->middleware('roleIn:user')
        ->name('subscribers/apply');

    Route::get('/favorite/{idJobOffer}',[SubscriberController::class, 'favoriteExecute'])
        ->middleware('roleIn:user')
        ->name('favoriteExecute');
});


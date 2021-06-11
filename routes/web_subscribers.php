<?php

//rotte per job catalog
use App\Http\Controllers\SubscriberController;
use \App\Http\Controllers\DashboardUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/subscribers')->group(function() {
    Route::get('/', [SubscriberController::class, 'subscribersCatalog'])->name('subscribers/getAll');



    Route::get('/apply/{idJobOffer}',[SubscriberController::class, 'apply'])
        ->middleware('roleIn:user')
        ->name('subscribers/apply');

    Route::get('/favorite/{idJobOffer}',[SubscriberController::class, 'favoriteExecute'])
        ->middleware('roleIn:user')
        ->name('favoriteExecute');

    Route::prefix('/{id}')->group(function() {
        Route::get('/',function($id) {
            return Redirect::route('profile',['type'=>'user','id'=>$id]);
        })->name('subscribers/getById');
        Route::get('/cv/download',[SubscriberController::class,'downloadCV'])->name('subscribers/download-cv');
    });

});


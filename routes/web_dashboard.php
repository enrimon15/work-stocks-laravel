<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::prefix('/dashboard')->middleware('auth')->middleware('roleIn:user,company')->group(function () {


    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/update-profile', [DashboardController::class, 'updateProfile'])->name('updateProfileExecute');

    Route::get('/change-password', [DashboardController::class, 'showChangePassword'])->name('changePassword');
    Route::post('/change-password', [DashboardController::class, 'changePassword'])->name('changePasswordExecute');

    Route::get('/favorite', [DashboardController::class, 'showFavorite'])->name('favorite');

    Route::get('/applied-jobs', [DashboardController::class, 'showAppliedJobs'])->name('appliedJobs');

    Route::get('/job-alert', [DashboardController::class, 'showJobAlert'])->name('jobAlert');

    Route::get('/online-cv', [DashboardController::class, 'showOnlineCV'])->name('onlineCV');
    Route::post('/online-cv/{operationType}', [DashboardController::class, 'populateOnlineCV'])->name('onlineCvExecute');
    Route::get('/online-cv/delete/{id}/{operationType}', [DashboardController::class, 'deleteRecordCv'])->name('onlineCvDelete');
    Route::get('/online-cv/edit/{operationType}/{id}', [DashboardController::class, 'editCV'])->name('onlineCvEdit');
    Route::get('/online-cv/download-cv', [DashboardController::class, 'downloadCv'])->name('downloadCv');
});

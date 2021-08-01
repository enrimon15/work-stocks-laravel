<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardUserController;
use \App\Http\Controllers\DashboardCompanyController;
use App\Http\Controllers\DashboardCommonController;

Route::prefix('/common')->middleware('roleIn:user,company')->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/change-password', [DashboardCommonController::class, 'showChangePassword'])->name('changePassword');
        Route::post('/change-password', [DashboardCommonController::class, 'changePassword'])->name('changePasswordExecute');
    });
});

Route::prefix('/user')->middleware('roleIn:user')->group(function () {

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardUserController::class, 'index'])->name('dashboardUser');

        Route::post('/update-profile', [DashboardUserController::class, 'updateProfile'])->name('updateProfileExecute');

        Route::prefix('/favorite')->group(function () {
            Route::get('/', [DashboardUserController::class, 'showFavorite'])->name('favorite');
            Route::get('/delete/{id}', [DashboardUserController::class, 'deleteFavorite'])->name('deleteFavorite');
        });

        Route::prefix('/applied-jobs')->group(function () {
            Route::get('/', [DashboardUserController::class, 'showAppliedJobs'])->name('appliedJobs');
            Route::get('/delete/{id}', [DashboardUserController::class, 'deleteAppliedJobs'])->name('deleteAppliedJob');
        });

        //Route::get('/job-alert', [DashboardUserController::class, 'showJobAlert'])->name('jobAlert');

        Route::prefix('/online-cv')->group(function () {
            Route::get('/', [DashboardUserController::class, 'showOnlineCV'])->name('onlineCV');
            Route::post('/{operationType}', [DashboardUserController::class, 'populateOnlineCV'])->name('onlineCvExecute');
            Route::get('/delete/{id}/{operationType}', [DashboardUserController::class, 'deleteRecordCv'])->name('onlineCvDelete');
            Route::get('/edit/{operationType}/{id}', [DashboardUserController::class, 'editCV'])->name('onlineCvEdit');
            Route::get('/download-cv', [DashboardUserController::class, 'downloadCv'])->name('downloadCv');
        });
    });

});


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

        Route::get('/favorite', [DashboardUserController::class, 'showFavorite'])->name('favorite');

        Route::get('/applied-jobs', [DashboardUserController::class, 'showAppliedJobs'])->name('appliedJobs');

        Route::get('/job-alert', [DashboardUserController::class, 'showJobAlert'])->name('jobAlert');

        Route::prefix('/online-cv')->group(function () {
            Route::get('/', [DashboardUserController::class, 'showOnlineCV'])->name('onlineCV');
            Route::post('/online-cv/{operationType}', [DashboardUserController::class, 'populateOnlineCV'])->name('onlineCvExecute');
            Route::get('/online-cv/delete/{id}/{operationType}', [DashboardUserController::class, 'deleteRecordCv'])->name('onlineCvDelete');
            Route::get('/online-cv/edit/{operationType}/{id}', [DashboardUserController::class, 'editCV'])->name('onlineCvEdit');
            Route::get('/online-cv/download-cv', [DashboardUserController::class, 'downloadCv'])->name('downloadCv');
        });
    });

});

Route::prefix('/company')->middleware('roleIn:company')->group(function () {

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardCompanyController::class, 'index'])->name('dashboardCompany');
        Route::post('/update-profile', [DashboardCompanyController::class, 'updateProfile'])->name('updateProfileCompanyExecute');

        Route::get('/working-places', [DashboardCompanyController::class, 'workingPlaces'])->name('workingPlacesCompany');
        Route::get('/edit-working-places/{id}', [DashboardCompanyController::class, 'editWorkingPlaces'])->name('editWorkingPlacesCompany');
        Route::post('/working-places', [DashboardCompanyController::class, 'executeWorkingPlaces'])->name('executeWorkingPlacesCompany');
        Route::get('/delete-working-places/{id}', [DashboardCompanyController::class, 'deleteWorkingPlaces'])->name('deleteWorkingPlacesCompany');

        Route::get('/new-job', [DashboardCompanyController::class, 'postNewJob'])->name('postNewJobCompany');
        Route::post('/new-job/{operationType}', [DashboardCompanyController::class, 'postNewJobExecute'])->name('postNewJobCompanyExecute');
        Route::get('/edit-job/{id}', [DashboardCompanyController::class, 'editJob'])->name('editJobCompany');

        Route::get('/manage-jobs', [DashboardCompanyController::class, 'manageJobs'])->name('manageJobsCompany');
    });

});

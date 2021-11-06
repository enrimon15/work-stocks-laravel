<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DashboardCompanyController;
use \App\Http\Controllers\CompaniesController;

Route::get('/companies',[CompaniesController::class,'companiesCatalog'])->name('companiesCatalog');

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
        Route::get('/delete-job/{id}', [DashboardCompanyController::class, 'deleteJob'])->name('deleteJob');
        Route::get('/job-candidates/{jobId}', [DashboardCompanyController::class, 'showCandidate'])->name('manageJobsCompanyCandidate');
    });

});

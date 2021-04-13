<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('layouts.outline');
});*/
Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', function () {
    return redirect('/');
})->name('home');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/update-profile', [DashboardController::class, 'updateProfile'])->name('updateProfileExecute');

Route::get('/dashboard/change-password', [DashboardController::class, 'showChangePassword'])->name('changePassword');
Route::post('/change-password', [DashboardController::class, 'changePassword'])->name('changePasswordExecute');

Route::get('/dashboard/favorite', [DashboardController::class, 'showFavorite'])->name('favorite');

Route::get('/dashboard/applied-jobs', [DashboardController::class, 'showAppliedJobs'])->name('appliedJobs');

Route::get('/dashboard/job-alert', [DashboardController::class, 'showJobAlert'])->name('jobAlert');

Route::get('/dashboard/online-cv', [DashboardController::class, 'showOnlineCV'])->name('onlineCV');

// PROFILE
Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');


/*Route::get('/test', function () {
    dd(\App\Models\User::all());
});*/

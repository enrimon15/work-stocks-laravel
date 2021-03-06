<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', function () {
    return redirect('/');
})->name('home');




//rotte di prova per la class active sui <li> del menu
Route::get('/offerte/pippo', [HomeController::class, 'index']);
Route::get('/candidati', [HomeController::class, 'index']);

<?php

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

/*Route::get('/', function () {
    return view('layouts.outline');
});*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', function () {
    return redirect('/');
})->name('home');

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/*Route::get('/test', function () {
    dd(\App\Models\User::all());
});*/

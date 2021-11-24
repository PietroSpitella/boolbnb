<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

// Route::get('/dashboard', 'HomeController@index')->name('home');

Route::middleware('auth')->namespace('Host')->prefix('host')->name('host.')
->group(function(){

    Route::get('/dashboard', 'HomeController@index')->name('home');

    Route::resource('/apartments', 'ApartmentController');
});

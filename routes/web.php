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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/about-us', 'HomeController@about')->name('about-us');

Route::resource('/apartments', 'ApartmentController');
Route::post('/new-message', 'MessageController@store')->name('store-message');
Auth::routes();
Route::get('/discover', 'HomeController@search')->name('discoverPage');

// Route::get('/dashboard', 'HomeController@index')->name('home');

Route::middleware('auth')->namespace('Host')->prefix('host')->name('host.')
->group(function(){

    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::get('/messages', 'HomeController@listMessage')->name('messages');
    Route::get('/messages/show/{message}', 'HomeController@showMessage')->name('show-message');
    Route::delete('/messages/delete/{message}', 'HomeController@destroyMessage')->name('delete-message');
    Route::resource('/apartments', 'ApartmentController');
});

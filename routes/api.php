<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/apartments', 'Api\ApartmentController@searchApartment');
Route::get('/apartment/{slug}', 'Api\ApartmentController@show');
Route::post('/statistics', 'Api\StatisticController@store');
Route::post('/contacts', 'Api\ApartmentController@sendMessage');
// Route::post('/sendcity', 'Api\ApartmentController@sendCity');
// Route::get('/sendcity', 'Api\ApartmentController@sendCity');
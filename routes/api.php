<?php

use Illuminate\Http\Request;

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

Route::post('/dashboard/location/add-location/save', 'LocationController@store')->name('save-location');

Route::post('/dashboard/admin/location/manage/{locationid}/update', 'LocationController@updateLocation')->name('location-manage-update');

Route::post('/dashboard/location/added-by-user/{locationid}/add-detail/update', 'DetailLocationController@update')->name('location-added-by-user-detail-add-update');

//Route::post('/dashboard/location/added-by-user/{locationid}/verify', 'LocationController@verifyLocation')->name('location-added-by-user-verify');
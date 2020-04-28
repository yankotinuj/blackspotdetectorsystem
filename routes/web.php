<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/dashboard/user', 'UserController@index')->name('userprofile');

Route::get('/dashboard/device', 'DeviceController@index')->name('device');

Route::get('/dashboard/location/added-by-user', 'LocationController@addedlocation')->name('location-added-by-user');

Route::get('/dashboard/location/added-by-user/{locationid}', 'DetailLocationController@index')->name('location-added-by-user-detail');

Route::get('/dashboard/location/added-by-user/{locationid}/add-detail', 'DetailLocationController@adddetail')->name('location-added-by-user-detail-add');

//Route::post('/dashboard/location/added-by-user/{locationid}/add-detail/update', 'DetailLocationController@update')->name('location-added-by-user-detail-add-update');

Route::get('/dashboard/location/by-list', 'LocationController@index')->name('location-by-list');

Route::get('/dashboard/location/by-list/{locationid}', 'DetailLocationController@index')->name('location-by-list-detail');

Route::get('/dashboard/location/add-location', 'LocationController@addLocation')->name('add-location');
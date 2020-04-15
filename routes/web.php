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

Route::get('/dashboard/location/by-list', 'LocationController@index')->name('location-by-list');

Route::get('/dashboard/location/by-list/{locationid}', 'DetailLocationController@index')->name('location-by-list-detail');
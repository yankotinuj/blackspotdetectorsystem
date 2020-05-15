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
    return view('landingpage');
})->name('landingpage');

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/dashboard/user', 'UserController@index')->name('userprofile');

Route::get('/dashboard/device', 'DeviceController@index')->name('device');

Route::get('/dashboard/statistics', 'StatisticController@index')->name('statistics');

/* ========== Bagian Menu Permintaan Tambah Lokasi ========== */

Route::get('/dashboard/location/added-by-user', 'LocationController@addedlocation')->name('location-added-by-user');

Route::get('/dashboard/location/added-by-user/{locationid}', 'DetailLocationController@index')->name('location-added-by-user-detail');

Route::get('/dashboard/location/added-by-user/{locationid}/add-detail', 'DetailLocationController@adddetail')->name('location-added-by-user-detail-add');

Route::get('/dashboard/location/added-by-user/{locationid}/delete', 'LocationController@delete')->name('location-added-by-user-delete');

Route::get('/dashboard/location/added-by-user/{locationid}/verify', 'LocationController@verifyLocation')->name('location-added-by-user-verify');

//Route::post('/dashboard/location/added-by-user/{locationid}/add-detail/update', 'DetailLocationController@update')->name('location-added-by-user-detail-add-update');

/* ========== ==================================== ========== */

/* =============== Bagian Menu Kelola Lokasi ================ */

Route::get('/dashboard/location/manage', 'LocationController@indexManageLocation')->name('location-manage');

Route::get('/dashboard/location/manage/{locationid}/edit', 'LocationController@edit')->name('location-manage-edit');

Route::get('/dashboard/location/manage/{locationid}/detail', 'DetailLocationController@index')->name('location-manage-detail');

Route::get('/dashboard/location/manage/{locationid}/detail/edit', 'DetailLocationController@adddetail')->name('location-manage-detail-edit');

Route::get('/dashboard/location/manage/{locationid}/delete', 'LocationController@delete')->name('location-manage-delete');

/* ========== ==================================== ========== */

Route::get('/dashboard/location/by-maps', 'MapsController@index')->name('location-by-maps');

Route::get('/dashboard/location/by-list', 'LocationController@index')->name('location-by-list');

Route::get('/dashboard/location/by-list/{locationid}', 'DetailLocationController@index')->name('location-by-list-detail');

Route::get('/dashboard/location/add-location', 'LocationController@addLocation')->name('add-location');
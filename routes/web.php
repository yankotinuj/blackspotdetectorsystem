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

Route::get('/dashboard/profile', 'UserController@index')->name('userprofile');

Route::get('/dashboard/device', 'DeviceController@index')->name('device');

Route::get('/dashboard/statistics', 'StatisticController@index')->name('statistics');

Route::get('/dashboard/location/by-maps', 'MapsController@index')->name('location-by-maps');

Route::get('/dashboard/location/by-list', 'LocationController@index')->name('location-by-list');

Route::get('/dashboard/location/by-list/{locationid}', 'DetailLocationController@index')->name('location-by-list-detail');

Route::get('/dashboard/location/add-location', 'LocationController@addLocation')->name('add-location');

/* ========== Routes Untuk Admin ========== */

Route::get('/dashboard/admin', 'HomeController@indexAdmin')->name('home-admin');

Route::get('/dashboard/admin/profile', 'UserController@indexAdmin')->name('userprofile-admin');

Route::get('/dashboard/admin/user/{username}', 'UserController@viewUser')->name('viewuserprofile');

Route::get('/dashboard/admin/device/{deviceid}', 'DeviceController@viewDevice')->name('viewdevice');

//Bagian Menu Lokasi Daerah Rawan Kecelakaan

Route::get('/dashboard/admin/location/by-maps', 'MapsController@index')->name('location-by-maps-admin');

Route::get('/dashboard/admin/location/by-list', 'LocationController@index')->name('location-by-list-admin');

Route::get('/dashboard/admin/location/by-list/{locationid}', 'DetailLocationController@index')->name('location-by-list-detail-admin');

Route::get('/dashboard/admin/location/add-location', 'LocationController@addLocation')->name('add-location-admin');

//Bagian Menu Kelola Lokasi

Route::get('/dashboard/admin/location/manage', 'LocationController@indexManageLocation')->name('location-manage');

Route::get('/dashboard/admin/location/manage/{locationid}/edit', 'LocationController@editLocation')->name('location-manage-edit');

Route::get('/dashboard/admin/location/manage/{locationid}/detail', 'DetailLocationController@index')->name('location-manage-detail');

Route::get('/dashboard/admin/location/manage/{locationid}/detail/edit', 'DetailLocationController@adddetail')->name('location-manage-detail-edit');

Route::get('/dashboard/admin/location/manage/{locationid}/delete', 'LocationController@delete')->name('location-manage-delete');

//Bagian Menu Permintaan Tambah Lokasi

Route::get('/dashboard/admin/location/added-by-user', 'LocationController@addedlocation')->name('location-added-by-user');

Route::get('/dashboard/admin/location/added-by-user/{locationid}', 'DetailLocationController@index')->name('location-added-by-user-detail');

Route::get('/dashboard/admin/location/added-by-user/{locationid}/add-detail', 'DetailLocationController@adddetail')->name('location-added-by-user-detail-add');

Route::get('/dashboard/admin/location/added-by-user/{locationid}/delete', 'LocationController@delete')->name('location-added-by-user-delete');

Route::get('/dashboard/admin/location/added-by-user/{locationid}/verify', 'LocationController@verifyLocation')->name('location-added-by-user-verify');

//Route::post('/dashboard/location/added-by-user/{locationid}/add-detail/update', 'DetailLocationController@update')->name('location-added-by-user-detail-add-update');

//Bagian Menu Statistik

Route::get('/dashboard/admin/statistics', 'StatisticController@indexAdmin')->name('statistics-admin');

Route::get('/dashboard/admin/statistics/{deviceid}', 'StatisticController@indexAdminView')->name('statistics-admin-view');

Route::get('/dashboard/admin/statistics/{deviceid}/{locationid}', 'StatisticController@indexAdminViewDetail')->name('statistics-admin-view-detail');

/* ======================================== */
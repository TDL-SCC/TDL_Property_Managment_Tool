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

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/create-reservation', 'AdminController@showAdminCreateResForm')->name('admin.create-res');
    Route::post('/create-reservation', 'AdminController@postAdminCreateRes')->name('admin.create-res.submit');

    Route::get('/update-reservation/{id}', 'AdminController@showAdminShowUpdateResForm')->name('admin.show-update-res');
    Route::post('/update-reservation', 'AdminController@postAdminUpdateRes')->name('admin.update-res.submit');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/get-all-reservations', 'AdminController@getAllReservations')->name('admin.get-all-reservations');

    Route::get('/get-all-customers', 'AdminController@getAllCustomers')->name('admin.get-all-customers');

    Route::post('/get-all-reservations', 'AdminController@getAllReservationsFilterByCheckIn')->name('admin.get-all-reservations-by-check-in-date');

    Route::get('/get-reservation/{id}', 'AdminController@getReservationById')->name('admin.get-reservation');

    Route::get('/get-receipt/reservation/{id}', 'AdminController@getReceiptByReservationId')->name('admin.get-receipt');

    //delete routes
    Route::get('/get-delete-reservation/{id}', 'AdminController@getDeleteRoute')->name('admin.get-delete-reservation');
    Route::post('/delete-reservation/{id}', 'AdminController@postDeleteReservation')->name('admin.delete-reservation');

    //check-in check-out routes
    Route::get('/get-check-guest-in/{id}', 'AdminController@checkGuestIn')->name('admin.check-guest-in');
    Route::get('/get-check-guest-out/{id}', 'AdminController@checkGuestOut')->name('admin.check-guest-out');
});

Route::get('api/getAvailableRooms', 'AdminController@getAvailableRooms')->name('api.getAvailableRooms');

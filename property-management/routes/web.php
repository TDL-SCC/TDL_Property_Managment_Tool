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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/create-reservation', 'AdminController@showAdminCreateResForm')->name('admin.create-res');
    Route::post('/create-reservation', 'AdminController@postAdminCreateRes')->name('admin.create-res.submit');

    Route::get('/update-reservation/{id}', 'AdminController@showAdminShowUpdateResForm')->name('admin.show-update-res');
    Route::post('/update-reservation', 'AdminController@postAdminUpdateRes')->name('admin.update-res.submit');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/get-all-reservations', 'AdminController@getAllReservations')->name('admin.get-all-reservations');
});

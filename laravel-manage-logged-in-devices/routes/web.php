<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/logged-in-devices', 'LoggedInDeviceManager@index')
    ->name('logged-in-devices.list')
    ->middleware('auth');

Route::get('/logout/all', 'LoggedInDeviceManager@logoutAllDevices')
    ->name('logged-in-devices.logoutAll')
    ->middleware('auth');

    Route::get('/logout/{device_id}', 'LoggedInDeviceManager@logoutDevice')
    ->name('logged-in-devices.logoutSpecific')
    ->middleware('auth');

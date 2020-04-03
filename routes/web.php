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

// Operator Route 
Route::Resource('operator', 'OperatorController');

// Bus Route
Route::Resource('bus', 'BusController');

// Route Region
Route::Resource('region', 'RegionController');

// Route Sub_Region
Route::Resource('subregion', 'Sub_RegionController');

// Route BusSchedule
Route::Resource('bus-schedule', 'BusScheduleController');
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
Route::get('/home/enquiry', 'HomeController@enquiry')->name('enquiry');

Route::get('users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

        
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
    Route::get('/showRegion', ['as'=>'showRegion', 'uses'=>'BusScheduleController@showRegion']);
    Route::get('/showOperator', ['as'=>'showOperator', 'uses'=>'BusScheduleController@showOperator']);

    
    // Password REset RoutEs  
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{{ token }}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});
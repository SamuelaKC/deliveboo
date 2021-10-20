<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartDataController;

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

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Route::resource('static', 'ChartDataController');
// Route::resource('static', 'ChartController');
// Route::get('/test', 'ChartDataController@getMonthlyOrderData');
Route::resource('orders', 'OrderController');
Route::resource('plates', 'PlateController');
Route::resource('static', 'ChartController');
Route::resource('users', 'UserController');
Route::get('users/img/{user}/edit', 'UserController@editImg')->name('users.editimg');
Route::put('users/img/{user}', 'UserController@updateImg')->name('users.updateimg');
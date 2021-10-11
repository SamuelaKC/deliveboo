<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::resource('plates', 'PlateController');

Route::get('/', 'HomeController@index')->name('home');

Route::resource('orders', 'OrderController');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('users', 'UserController');
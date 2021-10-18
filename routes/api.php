<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('orders', Api\OrderController::class); 
Route::resource('plates', Api\PlateController::class); 
Route::resource('users', Api\UserController::class);
Route::resource('tag', Api\TagController::class);  
Route::get('payment/generate', 'Api\PaymentController@generate');
Route::post('payment/make_payment', 'Api\PaymentController@makePayment');
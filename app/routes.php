<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');
Route::get('user', 'UserController@getIndex');
Route::post('user', 'UserController@postIndex');

Route::get('connect', 'UserController@getConnect');
Route::get('connectdone', 'UserController@getConnectdone');

Route::get('charge', 'UserController@getCharge');
Route::post('charge', 'UserController@postCharge');

Route::get('success-pay', 'UserController@getPaymentsuccess');

Route::get('stripe-customers', 'UserController@getStripecustomer');
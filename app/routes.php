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

Route::get('alluser/{id}', 'UserController@getAlluser');
Route::get('listuser/{id}', 'UserController@getListuser');

Route::get('connect', 'UserController@getConnect');
Route::get('connect-user', 'UserController@getConnectuser');

Route::get('connect-charge', 'UserController@getConnectCharge');
Route::post('connect-charge', 'UserController@postConnectCharge');

Route::get('connect-subscription', 'UserController@getConnectSubscription');
Route::post('connect-subscription', 'UserController@postConnectSubscription');

Route::get('connect-applicationfees', 'UserController@getApplicationfee');

Route::get('charge', 'UserController@getCharge');
Route::post('charge', 'UserController@postCharge');

Route::get('success', 'UserController@getSuccess');

Route::get('stripe-customers', 'UserController@getStripecustomer');

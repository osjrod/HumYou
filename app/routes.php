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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('login', 'HomeController@index');
Route::get('register', 'HomeController@index');


Route::get('logout', 'UserController@logout');


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('auth', 'UserController@isLogged');

Route::group(array('before' => 'auth'), function () {
	Route::get('restricted', 'HomeController@restricted');
});
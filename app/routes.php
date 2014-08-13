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

Route::get('/home', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::get('register', 'HomeController@register');



Route::get('logout', 'UserController@logout');


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('auth', 'UserController@isLogged');

Route::group(array('before' => 'auth'), function () {
	Route::get('/', 'HumController@humsTimeline');
	Route::get('/post', 'HumController@post');
	Route::get('/createHashtag', 'HashtagController@create');
	Route::get('/createMention', 'MentionController@create');
	Route::get('/editProfile', 'ProfileController@edit');
	Route::get('/updateProfile', 'ProfileController@update');
	Route::get('/search_tag', 'HumController@humsSearch');
	Route::get('/people', 'ProfileController@listPeople');
	Route::get('/sendRequest', 'RequestController@create');
	Route::get('/follow', 'FollowController@create');
	Route::get('/deleteRequest', 'RequestController@delete');
	Route::get('/follows', 'FollowController@listFollows');
	Route::get('/deleteFollow', 'FollowController@delete');
	Route::get('/changePassword', 'UserController@changePassword');
	Route::post('/uploadPicture', 'ProfileController@uploadPicture');
	Route::post('/profile', 'ProfileController@show');


});
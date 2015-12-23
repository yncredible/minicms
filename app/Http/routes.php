<?php
/**
 * Home
 */
Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home',
]);
/**
 * Authentication
 */
Route::get('/signup', [
	'uses' => 'AuthController@getSignup',
	'as' => 'auth.signup',
	'middleware' => ['guest'],
]);
Route::post('/signup', [
	'uses' => 'AuthController@postSignup',
	'middleware' => ['guest'],
]);
Route::get('/signin', [
	'uses' => 'AuthController@getSignin',
	'as' => 'auth.signin',
	'middleware' => ['guest'],	
]);
Route::post('/signin', [
	'uses' => 'AuthController@postSignin',
	'middleware' => ['guest'],
]);
Route::get('/signout', [
	'uses' => 'AuthController@getSignout',
	'as' => 'auth.signout',
]);

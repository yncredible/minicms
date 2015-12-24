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
/**
 * Content
 */
Route::get('/content/add', [
	'uses' => 'ContentController@getAddContent',
	'as' => 'content.add',
	'middleware' => ['auth'],
]);
Route::post('/content/add', [
	'uses' => 'ContentController@postAddContent',
	'as' => 'content.add',
	'middleware' => ['auth'],
]);
Route::get('/', [
	'uses' => 'ContentController@showContent',
	'as' => 'home',
]);
Route::get('/content/{id}', [
	'uses' => 'ContentController@showDetail',
	'as' => 'content.show',
]);
/**
 * Comments
 */
Route::post('/content/comment', [
	'uses' => 'CommentController@postComment',
	'as' => 'comment.add',
]);





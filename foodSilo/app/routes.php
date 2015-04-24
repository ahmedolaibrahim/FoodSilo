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
Route::get('/',array('uses'=>'FoodSiloController@showIndex','as'=>'index'));
Route::get('/forum',array('uses'=>'FoodSiloController@showForum','as'=>'forum'));
Route::get('/about',array('uses'=>'FoodSiloController@showAbout','as'=>'about'));
Route::post('/countryData/',array('uses'=>'FoodSiloController@doSearch','as'=>'handleSearch'));

Route::post('/register', array('uses' => 'UserController@doRegister', 'as'=>'register'));
Route::post('/login', array('uses' => 'UserController@doLogin', 'as'=>'login'));
Route::get('/logout', array('uses' => 'UserController@doLogout', 'as'=>'logout'));

Route::get('/forum', array('uses' => 'FoodSiloController@showForum', 'as'=>'forum'));

Route::get('/forum/post/{id}',  'FoodSiloController@showPost');
Route::post('/forum/post/{id}/comment',  'FoodSiloController@comment');

Route::get('countryData/Nigeria', function(){
	return View::make('foodStats/nigeria_foodstats');
});

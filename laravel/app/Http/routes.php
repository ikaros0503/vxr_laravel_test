<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/user',array('before'=>'auth','uses'=>'UserController@index'));
 
Route::get('/user/login','UserController@login');
 
Route::get('/user/logout',function(){
 Auth::logout();
 return Redirect::action('UserController@index');
 });
 
Route::post('/user/login','UserController@login');
Route::get('/user/register','UserController@register');
Route::post('/user/register','UserController@create');
Route::get('/user/auth','UserController@loginCompleted');
Route::get('/user/register_completed','UserController@registerCompleted');
Route::get('/user/search','UserController@search');
Route::get('/','UserController@index');
Route::post('/user/delete/{id}',array('as'=>'/user/delete','uses' => 'UserController@delete'));
Route::post('/user/edit/{id}',array('as'=>'/user/edit','uses' => 'UserController@edit'));
Route::post('/user/update/{id}',array('as'=>'/user/edit','uses'=>'UserController@update'));

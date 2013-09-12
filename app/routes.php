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

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'api/v1'), function()
{
	Route::post('user/new', 'UserController@new', array('only' => array('new')));
});

Route::group(array('prefix' => 'api/v1',  'before' => 'autenticacio'), function()
{
	Route::post('user/save','UserController@save');
    Route::resource('backup', 'BackupController');
    Route::resource('user', 'UserController', array('only' => array('save')));
});


Route::get('/ajax', function()
{
	return View::make('ajax');
});
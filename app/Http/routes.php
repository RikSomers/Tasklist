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

Route::get('/', 'TasklistController@index');

Route::resource('Tasklist', 'TasklistController');

Route::get('Category/export/{Category}', 'TaskCategoryController@export');
Route::resource('Category', 'TaskCategoryController');

Route::put('Task/signoff/{Task}', 'TaskController@signoff');
Route::resource('Task', 'TaskController');

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

Route::get('/', array('uses' => 'StartController@getIndex'));

Route::controller('admin/posts', 'PostsController');
Route::controller('admin/categories', 'CategoriesController');
Route::controller('start', 'StartController');
Route::controller('users', 'UsersController');
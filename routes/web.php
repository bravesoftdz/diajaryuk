<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    // Route::get('/materies', 'materyController@index' );
	Route::prefix('materies')->group(function () {
		Route::get('/', 'materyController@index');
		Route::get('/create', 'materyController@create');
	});

	Route::prefix('comments')->group(function () {
		Route::get('/', 'commentController@index');
		// Route::get('/create', 'commentController@create');
	});

	Route::prefix('questions')->group(function () {
		Route::get('/', 'questionController@index');
		Route::get('/create', 'questionController@create');
	});

	Route::prefix('try_outs')->group(function () {
		Route::get('/', 'tryOutController@index');
		Route::get('/create', 'tryOutController@create');
	});

    
});
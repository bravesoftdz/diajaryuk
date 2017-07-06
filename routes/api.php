<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('materies')->group(function () {
    Route::get('/', 'apiMateriesController@index' );
    Route::post('/', 'apiMateriesController@store' );
	Route::get('/{id}', 'apiMateriesController@getId' );
	Route::delete('/{id}', 'apiMateriesController@delete' );
	Route::put('/{id}', 'apiMateriesController@update' );
});

Route::prefix('try_outs')->group(function () {
    Route::get('/', 'apiTryOutController@index' );
    Route::post('/', 'apiTryOutController@store' );
	Route::get('/{id}', 'apiTryOutController@getId' );
	Route::delete('/{id}', 'apiTryOutController@delete' );
	Route::put('/{id}', 'apiTryOutController@update' );
});

Route::prefix('comments')->group(function () {
    Route::get('/', 'apiCommentController@index' );
    Route::post('/', 'apiCommentController@store' );
	Route::get('/{id}', 'apiCommentController@getId' );
	Route::delete('/{id}', 'apiCommentController@delete' );
	Route::put('/{id}', 'apiCommentController@update' );
});

Route::prefix('quizzes')->group(function () {
    Route::get('/', 'apiQuizController@index' );
    Route::post('/', 'apiQuizController@store' );
	Route::get('/{id}', 'apiQuizController@getId' );
	Route::delete('/{id}', 'apiQuizController@delete' );
	Route::put('/{id}', 'apiQuizController@update' );
});

Route::prefix('answers')->group(function () {
    Route::get('/', 'apiAnswerController@index' );
    Route::post('/', 'apiAnswerController@store' );
	Route::get('/{id}', 'apiAnswerController@getId' );
	Route::delete('/{id}', 'apiAnswerController@delete' );
	Route::put('/{id}', 'apiAnswerController@update' );
});

Route::prefix('questions')->group(function () {
    Route::get('/', 'apiQuestionController@index' );
    Route::post('/', 'apiQuestionController@store' );
	Route::get('/{id}', 'apiQuestionController@getId' );
	Route::delete('/{id}', 'apiQuestionController@delete' );
	Route::put('/{id}', 'apiQuestionController@update' );
});



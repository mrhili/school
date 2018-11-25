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

Route::middleware(['auth:api'],function (Request $request) {
    Route::post('/get-details', 'API\PassportController@getDetails');
});


Route::post('/login', 'API\PassportApiController@login');


Route::group(['middleware' => ['cors' ], 'prefix' => '/register' ],function(){


	Route::post('/', 'API\PassportApiController@register')->name('apiusers.register');


});



Route::group(['middleware' => ['auth:api','cors','grandmaster_api' ], 'prefix' => '/panel' ],function(){

	Route::group(['prefix' => '/local' ],function(){

		Route::post('/check', 'LocalApiController@check')->name('panels.check');


	});


});


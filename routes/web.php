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

Route::group(['middleware' => ['user']], function () {


});

Route::group(['middleware' => ['student']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
});

Route::group(['middleware' => ['parent']], function () {


});

Route::group(['middleware' => ['teatcher']], function () {


});

Route::group(['middleware' => ['secretaria']], function () {


});

Route::group(['middleware' => ['admin']], function () {

	Route::get('/add-student', 'StudentController@add')->name('students.add');
	Route::get('/add-parent', 'StudentController@add')->name('parents.add');
	Route::get('/add-teatcher', 'TeatcherController@add')->name('teatchers.add');
	Route::get('/add-sectaria', 'SecretariaController@add')->name('secretarias.add');

	Route::post('/store-student', 'StudentController@store')->name('students.store');
	Route::post('/store-parent', 'StudentController@store')->name('parents.store');
	Route::post('/store-teatcher', 'TeatcherController@store')->name('teatchers.store');
	Route::post('/store-sectaria', 'SecretariaController@store')->name('secretarias.store');

	Route::post('/etudients', 'Student@all')->name('students.all');


});

Route::group(['middleware' => ['master']], function () {

    Route::get('/configs', 'ConfigController@index')->name('configs.index');

    Route::post('/configs/store', 'ConfigController@store')->name('configs.store');

    Route::get('/configs/add', 'ConfigController@add')->name('configs.add');

    Route::post('/configs/store-config', 'ConfigController@storeConfig')->name('configs.store-config');

	Route::get('/add-admin', 'AdminController@add')->name('admins.add');
	Route::post('/store-master', 'MasterController@store')->name('masters.store');


});
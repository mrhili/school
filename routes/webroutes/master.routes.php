<?php
/*********************************PERSONELE*********************************/
  Route::get('/my-profile-as-master', 'MasterController@myProfile')->name('masters.my-profile');

/***********************************Human**********************************/

	Route::get('/add-user/{role?}', 'UserController@add')->name('users.add');

	Route::post('/store-user', 'UserController@store')->name('users.store');

  Route::get('/user-list', 'UserController@userlist')->name('users.userlist');

  Route::get('/user-list-data', 'UserController@userlistdata')->name('users.userlistdata');

/**********************Configs*********************************/
Route::get('/configs', 'ConfigController@index')->name('configs.index');
Route::post('/configs/store', 'ConfigController@store')->name('configs.store');
Route::get('/configs/add', 'ConfigController@add')->name('configs.add');
Route::post('/configs/store-config', 'ConfigController@storeConfig')->name('configs.store-config');


/*********************School config *****************************/
    Route::get('/school-configs', 'SchoolconfigController@index')->name('schoolconfigs.index');
    Route::post('/school-configs/store', 'SchoolconfigController@store')->name('schoolconfigs.store');
    Route::get('/schoolconfigs/add', 'SchoolconfigController@add')->name('schoolconfigs.add');
    Route::post('/schoolconfigs/store-config', 'SchoolconfigController@storeConfig')->name('schoolconfigs.store-config');

/**********************History*************************************/

	Route::get('/history-master', 'HistoryController@master')->name('histories.master');

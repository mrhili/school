<?php

  Route::get('/my-profile-as-master', 'MasterController@myProfile')->name('masters.my-profile');

	Route::get('/add-user/{role?}', 'UserController@add')->name('users.add');

	Route::post('/store-user', 'UserController@store')->name('users.store');

    Route::get('/school-configs', 'SchoolconfigController@index')->name('schoolconfigs.index');

    Route::get('/configs', 'ConfigController@index')->name('configs.index');

    Route::post('/school-configs/store', 'SchoolconfigController@store')->name('schoolconfigs.store');

    Route::post('/schoolconfigs/store', 'SchoolconfigController@store')->name('schoolconfigs.store');

    Route::post('/configs/store', 'ConfigController@store')->name('configs.store');

    Route::get('/schoolconfigs/add', 'SchoolconfigController@add')->name('schoolconfigs.add');

    Route::get('/configs/add', 'ConfigController@add')->name('configs.add');

    Route::post('/schoolconfigs/store-config', 'SchoolconfigController@storeConfig')->name('schoolconfigs.store-config');

    Route::post('/configs/store-config', 'ConfigController@storeConfig')->name('configs.store-config');

	Route::get('/history-master', 'HistoryController@master')->name('histories.master');

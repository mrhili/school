<?php

/*********************************CORRECT**************************************/
//correctNumberInEmail

Route::get('/students-correct', 'StudentController@correct')->name('students.correct');
Route::get('/students-correct-num-email', 'StudentController@correctNumberInEmail')->name('students.correct-num-in-email');

/*********************************PERSONELE*********************************/
  Route::get('/my-profile-as-master', 'MasterController@myProfile')->name('masters.my-profile');
  Route::get('/docs-master/{selected?}', 'MasterController@docs')->name('masters.docs');

/*****************WORKERS LOGIN*********************/

Route::get('/workers-login', 'WorkerController@workersLogin')->name('users.login');
Route::get('/data-workers-login', 'WorkerController@workersLoginData')->name('users.data-login');

Route::get('/workers-inv/{user?}', 'WorkerController@workersInv')->name('users.workers-inv');

/***********************************Human**********************************/

	Route::get('/add-user/{role?}', 'UserController@add')->name('users.add');

	Route::post('/store-user', 'UserController@store')->name('users.store');

  Route::get('/user-list', 'UserController@userlist')->name('users.userlist');

  Route::get('/user-list-data', 'UserController@userlistdata')->name('users.userlistdata');

/**************HUMAN GRADATION************************/

Route::get('/big-list', 'UserController@bigList')->name('users.big-list');
Route::get('/data-big-list', 'UserController@dataBigList')->name('users.data-big-list');
Route::get('/gradation/{user}', 'UserController@gradation')->name('users.gradation');
Route::post('/gradation-post/{user}', 'UserController@gradationPost')->name('users.grad-post');

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
/***************************DEBUG**************************************/

Route::get('/change-debug/{role}', 'DebugController@changeDebug')->name('debugs.change');

  /********************Artisan*******************************/


  //Clear Cache facade value:
  Route::get('/clear-cache', function() {
      $exitCode = Artisan::call('cache:clear');
      return '<h1>Cache facade value cleared</h1><p>'. $exitCode .'</p>';
  });

  //Reoptimized class loader:
  Route::get('/optimize', function() {
      $exitCode = Artisan::call('optimize',['--force' => '']);
      return '<h1>Reoptimized class loader</h1><p>'. $exitCode .'</p>';
  });

  //Route cache:
  Route::get('/route-cache', function() {
      $exitCode = Artisan::call('route:cache');
      return '<h1>Routes cached</h1><p>'. $exitCode .'</p>';
  });

  //Clear Route cache:
  Route::get('/route-clear', function() {
      $exitCode = Artisan::call('route:clear');
      return '<h1>Route cache cleared</h1><p>'. $exitCode .'</p>';
  });

  //Clear View cache:
  Route::get('/view-clear', function() {
      $exitCode = Artisan::call('view:clear');
      return '<h1>View cache cleared</h1><p>'. $exitCode .'</p>';
  });

  //Clear Config cache:
  Route::get('/config-cache', function() {
      $exitCode = Artisan::call('config:cache');
      return '<h1>Clear Config cleared</h1><p>'. $exitCode .'</p>';
  });

  Route::get('/config-clear', function() {
      $exitCode = Artisan::call('config:clear');
      return '<h1>Clear Config cleared</h1><p>'. $exitCode .'</p>';
  });

  Route::get('/composer-dumpautoload', function() {
      $exitCode = system('composer dump-autoload');
      return '<h1>Clear Config cleared</h1><p>'. $exitCode .'</p>';
  });

  //system('composer dump-autoload');

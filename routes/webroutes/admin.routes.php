<?php

Route::get('/docs-admin/{selected?}', 'AdminController@docs')->name('admins.docs');


Route::get('/my-profile-as-admin', 'AdminController@myProfile')->name('admins.my-profile');

Route::get('/admin-home', 'AdminController@home')->name('admins.home');

Route::get('/months-bd', 'HomeController@monthsBD')->name('home.months-bd');

Route::post('/valid-course/{course}', 'CourseyearsubclassController@valid')->name('courses.valid');
Route::post('/valid-test/{test}', 'TestyearsubclassController@valid')->name('tests.valid');

/***********************STUDENTS**************************************/

Route::post('/suprimer-etudiant/{user}', 'StudentController@delete')->name('students.delete');

/*********************************************************************/

Route::post('/valid-course/{course}', 'CourseyearsubclassController@valid')->name('courses.valid');

Route::get('/transportation-list', 'TransportingController@list')->name('transportings.list');

Route::post('/transportation-post', 'TransportingController@store')->name('transportings.post');

/*BILING*/

Route::get('/bils-manage', 'BilController@manage')->name('bils.manage');
Route::post('/bils-post', 'BilController@post')->name('bils.post');



Route::get('/bilan/{date?}', 'WalletController@bilan')->name('wallets.bilan');

Route::get('/data-bilan-def/{date?}', 'WalletController@dataDef')->name('wallets.data-def');

Route::get('/data-bilan-ben/{date?}', 'WalletController@dataBen')->name('wallets.data-ben');

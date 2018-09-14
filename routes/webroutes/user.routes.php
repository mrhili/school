<?php

Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/my-profile', 'HomeController@myProfile')->name('my-profile');
Route::get('/docs/{selected?}', 'HomeController@docs')->name('docs');
Route::get('/my-profile-as-user', 'UserController@myProfile')->name('users.my-profile');
Route::get('/user-profile/{user}', 'UserController@profile')->name('users.profile');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-home', 'UserController@home')->name('users.home');

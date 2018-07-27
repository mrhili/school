<?php
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/my-profile', 'HomeController@myProfile')->name('my-profile');
Route::get('/my-profile-as-user', 'UserController@myProfile')->name('users.my-profile');



Route::get('/home', 'HomeController@index')->name('home');

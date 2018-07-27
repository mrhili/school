<?php
Route::get('/my-profile-as-admin', 'AdminController@myProfile')->name('admins.my-profile');

Route::get('/months-bd', 'HomeController@monthsBD')->name('home.months-bd');

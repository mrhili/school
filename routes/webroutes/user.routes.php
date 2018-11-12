<?php




Route::post('/add-comment/{type}/{id}', 'CommentController@add')->name('comments.add');


///////////////////////////
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/my-profile', 'HomeController@myProfile')->name('my-profile');
Route::get('/docs/{selected?}', 'HomeController@docs')->name('docs');
Route::get('/my-profile-as-user', 'UserController@myProfile')->name('users.my-profile');
Route::get('/user-profile/{user}', 'UserController@profile')->name('users.profile');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-home', 'UserController@home')->name('users.home');



Route::get('/docs-user/{selected?}', 'UserController@docs')->name('users.docs');

Route::get('/videos/{page?}/{tab?}', 'VideopageController@display')->name('videos.display');



/***************POST******************************/


Route::get('/posts', 'PostController@index')->name('posts.index');

Route::post('/like-post/{post}', 'LaravelloveController@switch')->name('laravelloves.switch');

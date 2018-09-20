<?php
Route::get('/docs-parent/{selected?}', 'ParentController@docs')->name('parents.docs');

  Route::get('/my-profile-as-parent', 'ParentController@myProfile')->name('parents.my-profile');
  Route::get('/student-dashboard/{student}', 'StudentController@dashboard')->name('students.dashboard');

  Route::get('/parent-home', 'ParentController@home')->name('parents.home');


  Route::get('/child-notes/{child}', 'NoteController@childNotes')->name('notes.child-notes');
  Route::get('/data-child-notes/{child}', 'NoteController@dataChildNotes')->name('notes.data-child-notes');

  Route::get('/child-fournitures/{child}', 'FourniturationController@childFournitures')->name('fournitures.child-fournitures');
  Route::get('/data-child-fournitures/{child}', 'FourniturationController@dataChildFournitures')->name('fournitures.data-child-fournitures');


  Route::post('/fourniture-demande/{student}/{fourniture}/{howmany}', 'FournitureController@demande')->name('fournitures.demande');


/***********************BILING**************************/
  Route::post('/refuse-biling/{biling}', 'BilingController@refuse')->name('bilings.refuse');

  Route::get('/bilings-user/{user}', 'BilingController@user')->name('bilings.user');

  Route::get('/data-bilings-user/{user}', 'BilingController@userData')->name('bilings.user-data');

/********************Payments************************/

  Route::get('/child-payments/{student}', 'StudentsPaymentController@childPayments')->name('studentspayments.child-payments');
  Route::get('/data-child-payments/{student}', 'StudentsPaymentController@dataChildPayments')->name('studentspayments.data-child-payments');

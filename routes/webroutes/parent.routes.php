<?php
Route::get('/my-profile-as-parent', 'ParentController@myProfile')->name('parents.my-profile');
//Route::get('/my-profile-as-parent', 'ParentController@profile')->name('parents.profile');

Route::get('/parent-home', 'ParentController@home')->name('parents.home');

Route::get('/student-profile/{student}', 'StudentController@hisProfile')->name('students.a-profile');


  Route::get('/child-notes/{child}', 'NoteController@childNotes')->name('notes.child-notes');
  Route::get('/data-child-notes/{child}', 'NoteController@dataChildNotes')->name('notes.data-child-notes');

  Route::get('/child-fournitures/{child}', 'FourniturationController@childFournitures')->name('fournitures.child-fournitures');
  Route::get('/data-child-fournitures/{child}', 'FourniturationController@dataChildFournitures')->name('fournitures.data-child-fournitures');

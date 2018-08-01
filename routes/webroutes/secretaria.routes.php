<?php

/*PERSONELLE*/
Route::get('/my-profile-as-secretaria', 'SecretariaController@myProfile')->name('secretarias.my-profile');

Route::get('/secretaria-home', 'SecretariaController@home')->name('secretarias.home');

/*Printables*/

Route::get('/printable-sheet-new-student-with-parent/{student}/{parent}', 'PrintableController@printableSheeNewStudentWithParent')->name('printables.new-student-with-parent');

Route::get('/printable-sheet-new-worker/{worker}', 'PrintableController@printableSheeNewWorker')->name('printables.new-worker');



/*****Meetings******/

Route::get('/meeting-list-management', 'MeetingpopulatingController@managelist')->name('meetingpopulatings.managelist');
Route::get('/meeting-management/{meetingpopulating}', 'MeetingpopulatingController@manage')->name('meetingpopulatings.manage');

Route::get('/data-meeting-management/{meetingpopulating}', 'MeetingpopulatingController@dataManage')->name('meetingpopulatings.data-manage');

Route::put('/switch-present/{m}', 'MeetingpopulatingController@switchPresent')->name('meetingpopulatings.switch-present');

Route::get('/meetingtypes', 'MeetingtypeController@list')->name('meetingtypes.list');
Route::post('/store-meetingtype', 'MeetingtypeController@store')->name('meetingtypes.store');

Route::get('/meetings', 'MeetingController@list')->name('meetings.list');
Route::post('/store-meeting/{meetingtype}', 'MeetingController@store')->name('meetings.store');


/********HUMAN**************/

Route::get('/users/{role}', 'UserController@byRole')->name('users.by-role');
Route::get('/users-data-by-role/{role}', 'UserController@dataByRole')->name('users.data-by-role');

Route::get('/etudients', 'StudentController@all')->name('students.all');

Route::get('/add-student', 'StudentController@add')->name('students.add');
Route::post('/store-student', 'StudentController@store')->name('students.store');

Route::get('/students/{class}', 'StudentController@byClass')->name('students.by-class');
Route::get('/students-data-by-class/{class}', 'StudentController@dataByClass')->name('students.data-by-class');



Route::get('/parents', 'ParentController@all')->name('parents.all');



/***********CALLING*************/

Route::get('/new-call/{parent?}', 'CallingController@new')->name('callings.new');
Route::post('/store-new-call/{parent?}', 'CallingController@storeNew')->name('callings.store-new');

Route::get('/callings', 'CallingController@all')->name('callings.all');
Route::get('/data-callings', 'CallingController@dataAll')->name('callings.data-all');

Route::put('/switch-terminated-calling/{c}', 'CallingController@switchTerminatedCalling')->name('callings.switch-terminated-calling');
  Route::put('/write-result-calling/{c}', 'CallingController@writeResultCalling')->name('callings.write-result-calling');
  Route::get('/edit-calling/{calling}', 'CallingController@editCalling')->name('callings.edit');
  Route::get('/delete-calling/{calling}', 'CallingController@deleteCalling')->name('callings.delete');
  Route::put('/update-calling/{calling}', 'CallingController@updateCalling')->name('callings.update');





/************Fourniture*************/
Route::get('/fournitures/{class}', 'FournitureController@byClass')->name('fournitures.by-class');
Route::post('/link-fourniture-class/{class}/{fourniture_id}', 'FournitureController@linkClass')->name('fournitures.link-class');

Route::get('/fournitures', 'FournitureController@list')->name('fournitures.list');
Route::post('/store-fourniture', 'FournitureController@store')->name('fournitures.store');


/****************ROOMS*************/
Route::get('/rooms', 'RoomController@list')->name('rooms.list');
Route::post('/store-room/{etage}/{roomtype}', 'RoomController@store')->name('roomtypes.store');
Route::get('/roomtypes', 'RoomtypeController@list')->name('roomtypes.list');
Route::post('/store-roomtype', 'RoomtypeController@store')->name('roomtypes.store');
Route::get('/etages', 'EtageController@list')->name('etages.list');
Route::post('/store-etage', 'EtageController@store')->name('etages.store');





/******************object*******************************************/
Route::get('/objctypes', 'ObjctypeController@list')->name('objctypes.list');
Route::post('/store-objctype', 'ObjctypeController@store')->name('objctypes.store');

Route::get('/objcts', 'ObjctController@list')->name('objcts.list');
Route::post('/store-objct/{room}/{objctype}', 'ObjctController@store')->name('objcts.store');


/*********************************Payment****************************************/
Route::post('/add-payment-student/{id}/{payment}/{month}/{year}/{class}', 'StudentsPaymentController@addPayment')->name('students.add-payment');
Route::post('/add-payment-user/{id}/{payment}/{month}/{year}', 'UserspaymentController@addPayment')->name('users.add-payment');



/**********************SUBJECT*****************/

Route::get('/subjects/{class}', 'SubjectController@byClass')->name('subjects.by-class');
Route::post('/link-subject-class/{class}/{subject_id}', 'SubjectController@linkClass')->name('subjects.link-class');

Route::get('/subjects', 'SubjectController@list')->name('subjects.list');
Route::post('/store-subject', 'SubjectController@store')->name('subjects.store');

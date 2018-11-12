<?php

Route::get('/docs-secretaria/{selected?}', 'SecretariaController@docs')->name('secretaria.docs');

/*PERSONELLE*/
Route::get('/my-profile-as-secretaria', 'SecretariaController@myProfile')->name('secretarias.my-profile');

Route::get('/secretaria-home', 'SecretariaController@home')->name('secretarias.home');
//VIDEOS
Route::get('/videos-list', 'VideoController@list')->name('videos.list');
Route::post('/videos-store/{tab}', 'VideoController@store')->name('videos.store');
//VIDEOSTAB
Route::get('/videotabs-list', 'VideotabController@list')->name('videotabs.list');
Route::post('/videotabs-store/{page}', 'VideotabController@store')->name('videotabs.store');

//VideosPage
Route::get('/videopages-list', 'VideopageController@list')->name('videopages.list');
Route::post('/videopages-store', 'VideopageController@store')->name('videopages.store');
/*Printables*/

Route::get('/printable-sheet-new-student-with-parent/{student}/{parent}', 'PrintableController@printableSheeNewStudentWithParent')->name('printables.new-student-with-parent');

Route::get('/printable-sheet-new-worker/{worker}', 'PrintableController@printableSheeNewWorker')->name('printables.new-worker');

/*******************************disciplineS******************************/
Route::get('/disciplines', 'disciplineController@list')->name('disciplines.list');
Route::post('/store-discipline', 'disciplineController@store')->name('disciplines.store');


/*******************************Competitions******************************/
Route::get('/competitions', 'CompetitionController@list')->name('competitions.list');
Route::post('/store-competition/{discipline}', 'CompetitionController@store')->name('competitions.store');

/*******************************Teams******************************/
Route::get('/teams', 'TeamController@list')->name('teams.list');
Route::post('/store-team', 'TeamController@store')->name('teams.store');


/*********************************CLASSES*************************************************************/

/**************************BILING******************************/

/*************************Transporting***************************/


Route::get('/add-deficite', 'MaterialdeficiteController@add')->name('materialdeficites.add');

Route::post('/store-deficite', 'MaterialdeficiteController@store')->name('materialdeficites.store');


/********SWITCHING***BYLING***********************/

Route::post('/switch-toke-biling/{biling}', 'BilingController@switchToke')->name('bilings.switch-toke');

Route::post('/switch-payed-biling/{biling}', 'BilingController@switchPayed')->name('bilings.switch-payed');


/*******BILING BY CLASS**********/


Route::get('/biling-by-class/{class?}', 'BilingController@byClass')->name('bilings.by-class');
Route::post('/generate-biling-to-class/{class?}', 'BilingController@generateToClass')->name('bilings.generate-to-class');

Route::get('/data-biling-by-class/{class}', 'BilingController@dataByClass')->name('bilings.data-by-class');


/**********************************Claendar teatchifications****************************************/

Route::get('/management-calendar-teatchifcation/{class}', 'CalendarteatchificationController@managebyclass')->name('calendarteatchifications.manage-byclass');
Route::get('/data-management-calendar-teatchifcation/{class}', 'CalendarteatchificationController@dataManagebyclass')->name('calendarteatchifications.data-manage-byclass');
Route::post('/store-management-calendar-teatchifcation/{teatchification}', 'CalendarteatchificationController@store')->name('calendarteatchifications.store');

/*************************************TEATCHIFICATION - link ******************************/

Route::get('/link-teatcher-subcourse-class', 'TeatchificationController@link')->name('teatcherifications.link');
Route::post('/store-link-teatcher-subcourse-class/{teatcher}/{subject_the_class_id}', 'TeatchificationController@storeLink')->name('teatcherifications.store-link');

Route::get('/multi-link-teatcher-subcourse-class', 'TeatchificationController@multiLink')->name('teatcherifications.multi-link');
Route::post('/store-multi-link-teatcher-subcourse-class', 'TeatchificationController@storeMultiLink')->name('teatcherifications.store-multi-link');
/*****Meetings******/

Route::get('/meeting-list-management', 'MeetingpopulatingController@managelist')->name('meetingpopulatings.managelist');
Route::get('/meeting-management/{meetingpopulating}', 'MeetingpopulatingController@manage')->name('meetingpopulatings.manage');

Route::get('/data-meeting-management/{meetingpopulating}', 'MeetingpopulatingController@dataManage')->name('meetingpopulatings.data-manage');

Route::post('/switch-present/{m}', 'MeetingpopulatingController@switchPresent')->name('meetingpopulatings.switch-present');

Route::get('/meetingtypes', 'MeetingtypeController@list')->name('meetingtypes.list');
Route::post('/store-meetingtype', 'MeetingtypeController@store')->name('meetingtypes.store');

Route::get('/meetings', 'MeetingController@list')->name('meetings.list');
Route::post('/store-meeting/{meetingtype}', 'MeetingController@store')->name('meetings.store');


/********HUMAN**************/

//Importer les etudiants depuis excel

Route::get('/import-students-excel', 'StudentController@importExcel')->name('students.import-excel');
Route::post('/post-import-students-excel', 'StudentController@postImportExcel')->name('students.post-import-excel');

Route::get('/users/{role}', 'UserController@byRole')->name('users.by-role');
Route::get('/users-data-by-role/{role}', 'UserController@dataByRole')->name('users.data-by-role');

Route::get('/etudients', 'StudentController@all')->name('students.all');
Route::get('/valider-etudients', 'StudentController@validaTheme')->name('students.validat-them');
Route::get('/data-valider-etudients', 'StudentController@dataValidaTheme')->name('students.data-validat-them');


Route::post('/valider-les-etidants-put', 'StudentController@putValidaTheme')->name('students.put-validat-them');
Route::post('/suprimer-les-etidants-en-attente', 'StudentController@delThem')->name('students.del-them');
///
Route::get('/add-student', 'StudentController@add')->name('students.add');
Route::post('/store-student', 'StudentController@store')->name('students.store');

Route::get('/quick-add-student', 'StudentController@quickAdd')->name('students.quick-add');
Route::post('/quick-store-student', 'StudentController@quickStore')->name('students.quick-store');

Route::get('/add-parent/{student?}', 'ParentController@add')->name('parents.add');
Route::post('/store-parent', 'ParentController@store')->name('parents.store');

Route::get('/parents', 'ParentController@all')->name('parents.all');

/************Student Ordering********************/

Route::get('/ordering/{class}', 'StudentController@ordering')->name('students.ordering');
Route::post('/write-order/{student}', 'StudentController@order')->name('students.order');
Route::post('/write-order-manualy/{student}', 'StudentController@orderManualy')->name('students.order-manualy');

/************LOGIN*******************************/

Route::get('/students-login/{class}', 'StudentController@loginByClass')->name('students.login-by-class');
Route::get('/students-data-login-by-class/{class}', 'StudentController@dataLoginByClass')->name('students.data-login-by-class');
Route::get('/get-logs/{user}', 'CatcherController@logs')->name('catchers.log');

/***********INVITATION**************************/
Route::get('/students-inv-by/{class?}', 'StudentController@inv')->name('students.inv');

/********HUMAN CLASS**************/

Route::get('/change-class-4-stud-page/{student}', 'TheClassController@change4StudentPage')->name('classes.change-4-student-page');
Route::post('/change-class-4-stud/{student}', 'TheClassController@change4Student')->name('classes.change-4-student');


Route::get('/changer-class-pour-eux-page', 'StudentController@changeClass4ThemPage')->name('students.migration');
Route::post('/changer-class-pour-eux', 'StudentController@changeClass4Them')->name('students.migration-post');


/***********CALLING*************/

Route::get('/new-call/{parent?}', 'CallingController@new')->name('callings.new');
Route::post('/store-new-call/{parent?}', 'CallingController@storeNew')->name('callings.store-new');

Route::get('/callings', 'CallingController@all')->name('callings.all');
Route::get('/data-callings', 'CallingController@dataAll')->name('callings.data-all');

Route::post('/switch-terminated-calling/{c}', 'CallingController@switchTerminatedCalling')->name('callings.switch-terminated-calling');
  Route::post('/write-result-calling/{c}', 'CallingController@writeResultCalling')->name('callings.write-result-calling');
  Route::get('/edit-calling/{calling}', 'CallingController@editCalling')->name('callings.edit');
  Route::get('/delete-calling/{calling}', 'CallingController@deleteCalling')->name('callings.delete');
  Route::post('/update-calling/{calling}', 'CallingController@updateCalling')->name('callings.update');





/************Fourniture*************/
Route::get('/fournitures/{class}', 'FournitureController@byClass')->name('fournitures.by-class');
Route::post('/link-fourniture-class/{class}/{fourniture_id}', 'FournitureController@linkClass')->name('fournitures.link-class');

Route::get('/fournitures', 'FournitureController@list')->name('fournitures.list');
Route::post('/store-fourniture', 'FournitureController@store')->name('fournitures.store');

//classes.multiple-fours

Route::get('/linker-multiple-fours-au-classes', 'TheClassController@multipleFournitures')->name('classes.multiple-fours');
Route::post('/store-multiple-fours-au-classes', 'TheClassController@storeMultipleFournitures')->name('classes.store-multiple-fours');

/********************Demande Fourniture******************************/

Route::get('/demandefourniture-list', 'DemandefournitureController@list')->name('demandefournitures.list');
Route::post('/accepte-demande-fourniture/{demande}', 'DemandefournitureController@accept')->name('demandefournitures.accept');
Route::get('/demandefourniture-load', 'DemandefournitureController@loadDataAjax')->name('demandefournitures.loaddata');

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

Route::get('/students/{class}', 'StudentController@byClass')->name('students.by-class');
Route::get('/students-data-by-class/{class}', 'StudentController@dataByClass')->name('students.data-by-class');
/******************************UNITIES***************************/

Route::get('/unities', 'UnityController@list')->name('unities.list');
Route::post('/store-unity', 'UnityController@store')->name('unities.store');

/******************************SUB UNITIES***************************/

Route::get('/subunities', 'SubunityController@list')->name('subunities.list');
Route::post('/store-subunity/{unity}', 'SubunityController@store')->name('subunities.store');

/**********************SUBJECT*****************/

Route::get('/subjects/{class}', 'SubjectController@byClass')->name('subjects.by-class');
Route::post('/link-subject-class/{class}/{subject_id}', 'SubjectController@linkClass')->name('subjects.link-class');



Route::get('/subjects', 'SubjectController@list')->name('subjects.list');
Route::post('/store-subject/{subunity}', 'SubjectController@store')->name('subjects.store');

/*********************CLASS MULTIPLE SUBJECTS *************/

Route::get('/linker-multiple-subjs-au-classes', 'TheClassController@multipleSubjects')->name('classes.multiple-subjs');
Route::post('/store-multiple-subjs-au-classes', 'TheClassController@storeMultipleSubjects')->name('classes.store-multiple-subjs');

/*****************************Courses*********************/

Route::get('/courses', 'CourseController@list')->name('courses.list');

<?php
/***********************PERSONELLE*****************************/
Route::get('/docs-student/{selected?}', 'StudentController@docs')->name('students.docs');
/***********************PERSONELLE*FAMILY****************************/
Route::get('/ajouter-membre-famille/{student?}', 'StudentController@addParent')->name('students.add-parent');
Route::post('/ajouter-membre-famille-post/{student}', 'StudentController@addParentPost')->name('students.add-parent-post');
/************************************************/


  Route::post('/change-info/{user}', 'UserController@changeInfo')->name('users.change-info');

  Route::get('/my-profile-as-student', 'StudentController@myProfile')->name('students.my-profile');
  Route::get('/student-profile/{student}', 'StudentController@profile')->name('students.profile');
  Route::get('/parent-profile/{user}', 'ParentController@profile')->name('parents.profile');
  Route::get('/teatcher-profile/{user}', 'TeatcherController@profile')->name('teatchers.profile');

  Route::get('/secretaria-profile/{user}', 'TeatcherController@profile')->name('secretarias.profile');
  Route::get('/admin-profile/{user}', 'AdminController@profile')->name('admins.profile');
  Route::get('/master-profile/{user}', 'MasterController@profile')->name('masters.profile');

	Route::get('/my-meetings', 'MeetingpopulatingController@mine')->name('meetings.mine');
	Route::get('/data-my-meetings', 'MeetingpopulatingController@dataMine')->name('meetings.data-mine');

	Route::get('/see-note/{meetingpopulating}', 'MeetingpopulatingController@see')->name('meetingpopulatings.see-note');
	Route::post('/modify-note/{meetingpopulating}', 'MeetingpopulatingController@modify')->name('meetingpopulatings.modify-note');

	Route::get('/write-obs', 'ObservationController@write')->name('observations.write');
	Route::get('/write-obs-for/{user}', 'ObservationController@writefor')->name('observations.write-for');
	Route::post('/write-obs-for/{user}', 'ObservationController@postWritefor')->name('observations.post-write-for');
	Route::get('/my-obs', 'ObservationController@myObs')->name('observations.my-obs');
	Route::get('/data-my-obs', 'ObservationController@dataMyObs')->name('observations.data-my-obs');
	Route::post('/reporte-obs/{o}', 'ObservationController@switchReported')->name('observations.switch-reported-obs');
	Route::post('/delete-obs', 'ObservationController@deleteObs')->name('observations.delete-obs');

/****************NOTE*********************/

Route::get('/voire-note/{note}', 'NoteController@see')->name('notes.see');

/******************************************/

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/change-year/{id}', 'YearController@changeYear')->name('years.change');
    Route::get('/student/{id}', 'StudentController@show')->name('students.show');
    Route::get('/student-home', 'StudentController@home')->name('students.home');
    Route::get('/student-my-tests', 'TestController@studentMyTests')->name('tests.my-tests');
    Route::get('/pass-test/{test}', 'TestController@passTest')->name('tests.pass-test');
    Route::post('/get-note/{test}/{note}', 'TestController@getNote')->name('tests.get-note');
    Route::get('/student-notes/{student}', 'NoteController@studentNotes')->name('notes.student-notes');
    Route::get('/data-student-notes/{student}', 'NoteController@dataStudentNotes')->name('notes.data-student-notes');

    Route::get('/my-fournitures', 'FourniturationController@myFournitures')->name('fournitures.my-fournitures');
    Route::get('/data-my-fournitures', 'FourniturationController@dataMyfournitures')->name('fournitures.data-my-fournitures');
    Route::post('/switch-exist-fourniture/{f}', 'FourniturationController@switchExist')->name('fournitures.switch-exist-fourniture');
    Route::post('/switch-confirmed-fourniture/{f}', 'FourniturationController@switchConfirmed')->name('fournitures.switch-confirmed-fourniture');
    Route::post('/switch-rejected-fourniture/{f}', 'FourniturationController@switchRejected')->name('fournitures.switch-rejected-fourniture');


    Route::post('/demande-fourniture/{f}/{n}', 'FourniturationController@demande')->name('fournitures.demande');

    Route::get('/student-courses/{student}', 'CourseController@studentCourses')->name('courses.student-courses');

    Route::get('/subcourse-show/{course}/{subcourse}', 'SubcourseController@show')->name('subcourses.show');

    Route::get('/course-show/{course}', 'CourseyearsubclassController@show')->name('courses.show');
/*********************************PREPERFICATION*******************************/
    Route::get('/preperfications-etudiant/{student?}', 'PreperficationController@student')->name('preperfications.student');
    Route::get('/data-preperfications-etudiant/{student}', 'PreperficationController@studentData')->name('preperfications.data-student');


/********************TEST**********************/

Route::get('/show-test-any-no-answers/{test}', 'TestController@showAnyNoAnswers')->name('tests.show-any-no-answers');

Route::get('/show-test-link-no-answers/{test}', 'TestController@showLinkNoAnswers')->name('tests.show-link-no-answers');
Route::get('/show-test-image-no-answers/{test}', 'TestController@showImageNoAnswers')->name('tests.show-image-no-answers');
Route::get('/show-test-pdf-no-answers/{test}', 'TestController@showPdfNoAnswers')->name('tests.show-pdf-no-answers');
Route::get('/show-test-doc-no-answers/{test}', 'TestController@showDocNoAnswers')->name('tests.show-doc-no-answers');
Route::get('/show-test-editor-no-answers/{test}', 'TestController@showEditorNoAnswers')->name('tests.show-editor-no-answers');

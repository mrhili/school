<?php

Route::get('/docs-student/{selected?}', 'StudentController@docs')->name('student.docs');

  Route::put('/change-info/{user}', 'UserController@changeInfo')->name('users.change-info');

  Route::get('/my-profile-as-student', 'StudentController@myProfile')->name('students.my-profile');
  Route::get('/student-profile/{student}', 'StudentController@profile')->name('students.profile');
  Route::get('/parent-profile/{user}', 'ParentController@profile')->name('parents.profile');


  Route::get('/teatcher-profile/{user}', 'TeatcherController@profile')->name('teatchers.profile');

	Route::get('/my-meetings', 'MeetingpopulatingController@mine')->name('meetings.mine');
	Route::get('/data-my-meetings', 'MeetingpopulatingController@dataMine')->name('meetings.data-mine');

	Route::get('/see-note/{meetingpopulating}', 'MeetingpopulatingController@see')->name('meetingpopulatings.see-note');
	Route::put('/modify-note/{meetingpopulating}', 'MeetingpopulatingController@modify')->name('meetingpopulatings.modify-note');

	Route::get('/write-obs', 'ObservationController@write')->name('observations.write');
	Route::get('/write-obs-for/{user}', 'ObservationController@writefor')->name('observations.write-for');
	Route::post('/write-obs-for/{user}', 'ObservationController@postWritefor')->name('observations.post-write-for');
	Route::get('/my-obs', 'ObservationController@myObs')->name('observations.my-obs');
	Route::get('/data-my-obs', 'ObservationController@dataMyObs')->name('observations.data-my-obs');
	Route::put('/reporte-obs/{o}', 'ObservationController@switchReported')->name('observations.switch-reported-obs');
	Route::delete('/delete-obs', 'ObservationController@deleteObs')->name('observations.delete-obs');



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

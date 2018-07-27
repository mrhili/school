<?php


Route::get('/my-profile-as-teatcher', 'TeatcherController@myProfile')->name('teatchers.my-profile');
Route::get('/teatcher-profile/{teatcher}', 'TeatcherController@profile')->name('teatchers.profile');

Route::get('/courses', 'CourseController@list')->name('courses.list');
Route::post('/store-course', 'CourseController@store')->name('courses.store');
//ading and linking sub course
Route::get('/add-subcourse/{course}', 'SubcourseController@addSubCourse2Course')->name('subcourses.add-link');
Route::post('/add-subcourse/{course}', 'SubcourseController@storeSubCourse2Course')->name('subcourses.store-link');
Route::put('/link-subcourse/{course}/{subcourse}', 'SubcourseController@linkSubCourse2Course')->name('subcourses.link-course');

//Before
Route::post('/add-subcourse-before/{course}/{subcourse}', 'SubcourseController@storeSubCourse2CourseBefore')->name('subcourses.store-link-before');
Route::put('/link-subcourse-before/{course}/{subcourse}/{subcourseBefore}', 'SubcourseController@linkSubCourse2CourseBefore')->name('subcourses.link-course-before');
//After
Route::post('/add-subcourse-after/{course}/{subcourse}', 'SubcourseController@storeSubCourse2CourseAfter')->name('subcourses.store-link-after');
Route::put('/link-subcourse-after/{course}/{subcourse}/{subcourseAfter}', 'SubcourseController@linkSubCourse2CourseAfter')->name('subcourses.link-course-after');
//Repace

Route::post('/replace-subcourse/{course}/{subcourse}', 'SubcourseController@storeSubCourse2CourseAndDetachSubcourse')->name('subcourses.replace-new');
Route::put('/replace-link-subcourse/{course}/{subcourse}/{detach}', 'SubcourseController@linkSubCourse2CourseAndDetachSubcourse')->name('subcourses.replace-link');


//Delete
Route::delete('/detach-subcourse-from-course/{course}/{subcourse}', 'SubcourseController@detachSubcourseFromCourse')->name('subcourses.detach');
Route::delete('/destroy-subcourse/{subcourse}', 'SubcourseController@destroy')->name('subcourses.destroy');


//--------------------------------//

Route::get('/classes', 'TheClassController@list')->name('classes.list');

Route::get('/test-language/', 'TestController@language')->name('tests.language');
Route::get('/add-test/{language?}', 'TestController@add')->name('tests.add');
Route::post('/post-test/', 'TestController@store')->name('tests.store');

Route::get('/test-language-linked/{class_id}/{subject_id}', 'TestController@languageLinked')->name('tests.language-linked');
Route::get('/add-test-linked/{class_id}/{subject_id}/{language?}', 'TestController@addLinked')->name('tests.add-linked');
Route::post('/post-test-linked/{class_id}/{subject_id}', 'TestController@storeLinked')->name('tests.store-linked');

Route::get('/add-test-linked-linking/{class_id}/{subject_id}', 'TestController@addLinkedLinking')->name('tests.add-linked-linking');
Route::post('/post-test-linked-linking/{test}/{class_id}/{subject_id}', 'TestController@storeLinkedLinking')->name('tests.store-linked-linking');

Route::get('/get-answers/{test}', 'TestController@getAnswers')->name('tests.get-answers');
Route::post('/post-answers/{test}', 'TestController@postAnswers')->name('tests.store-answers');
Route::get('/tests', 'TestController@index')->name('tests.index');

Route::get('/data-check-fournitures/{class}', 'FourniturationController@dataCheck')->name('fournitures.data-check-by-class');

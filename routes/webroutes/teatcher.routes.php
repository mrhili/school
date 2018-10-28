<?php
//
Route::get('/profile-students/{class}', 'StudentController@profileByClass')->name('students.profile-by-class');

Route::get('/docs-teatcher/{selected?}', 'TeatcherController@docs')->name('teatchers.docs');

/*******************************NOTE***********************************/


Route::get('/notes-final-by-class/{class}', 'NoteController@finalByClass')->name('notes.final-by-class');
Route::get('/data-notes-final-by-class/{class}', 'NoteController@finalByClassData')->name('notes.final-data-by-class');

Route::get('/notes-by-student/{student}', 'NoteController@byStudent')->name('notes.by-student');

Route::get('/notes-by-unity/{student}/{unity}', 'NoteController@byunity')->name('notes.by-unity');

Route::get('/notes-by-subunity/{student}/{subunity}', 'NoteController@bysubunity')->name('notes.by-subunity');
Route::get('/notes-by-subject/{student}/{subject}', 'NoteController@bysubject')->name('notes.by-subject');


Route::get('/notes-by-class/{class}', 'NoteController@byClass')->name('notes.by-class');
Route::get('/data-notes-by-class/{class}', 'NoteController@databyClass')->name('notes.data-by-class');

Route::get('/notes-by-tysc/{tysc}', 'NoteController@byTYSC')->name('notes.by-tysc');
Route::get('/data-notes-by-tysc/{tysc}', 'NoteController@byTYSCData')->name('notes.data-by-tysc');


Route::get('/modify-note/{note}', 'NoteController@modify')->name('notes.modify');
Route::post('/store-info/{note}', 'NoteController@storeInfo')->name('notes.store-info');
//STORE IMAGES
Route::post('/note-store-images/{note}', 'FileController@storeNoteImages')->name('files.store-note-images');
Route::post('/note-drop-image/{note}', 'FileController@dropNoteImage')->name('files.drop-note-image');




Route::get('/data-students-by-teatcher/{teatcher}', 'StudentController@dataByTeatcher')->name('students.by-teatcher');



Route::get('/teatcher-home', 'TeatcherController@home')->name('teatchers.home');
Route::get('/my-profile-as-teatcher', 'TeatcherController@myProfile')->name('teatchers.my-profile');

/***********************Preperfication*********************************/

Route::get('/preperfications/{class}/{subject}', 'PreperficationController@mineBySubClass')->name('preperfications.mine-by-sub-class');

Route::get('/data-preperfications/{teatchification}', 'PreperficationController@byTeatchificationData')->name('preperfications.by-teatchification');


Route::post('/new-preperfication/{teatchification}', 'PreperficationController@new')->name('preperfications.new');
Route::get('/manage-preperfication/{title}', 'PreperficationController@manage')->name('preperfications.manage');
Route::get('/data-manage-preperfication/{title}', 'PreperficationController@manageData')->name('preperfications.manage-data');

Route::post('/delete-preperfication', 'PreperficationController@delete')->name('preperfications.delete');

Route::post('/preperfication-switch-present/{preperfication}', 'PreperficationController@switchPresent')->name('preperfications.switch-present');
Route::post('/preperfication-switch-get-it/{preperfication}', 'PreperficationController@switchGetIt')->name('preperfications.switch-get-it');


/***********************Unity_Subunities*****************/

Route::get('/get-subunities-from/{unity}', 'SubunityController@getFromUnity')->name('subunities.get-from-unity');



/***********************RULE****************************************/

Route::get('/rules', 'RuleController@list')->name('rules.list');
Route::get('/data-rules', 'RuleController@listData')->name('rules.data-list');
Route::post('/store-rule', 'RuleController@post')->name('rules.post');
Route::post('/link-rule/{rule}', 'RuleController@link')->name('rules.link');
Route::post('/delete-ruleholder/{ruleholder}', 'RuleholderController@delete')->name('ruleholders.delete');

Route::get('/my-rules', 'RuleController@myRules')->name('rules.mine');
Route::get('/data-my-rules/{teatcher}', 'RuleController@dataMyRules')->name('rules.data-mine');

/*************************COURSE************************************/

Route::get('/courses-teatcher/{teatcher}', 'CourseController@list4teatcher')->name('courses.list-4-teatcher');
Route::post('/store-course', 'CourseController@store')->name('courses.store');
//ading and linking sub course
Route::get('/add-subcourse/{course}', 'SubcourseController@addSubCourse2Course')->name('subcourses.add-link');
Route::post('/add-subcourse/{course}', 'SubcourseController@storeSubCourse2Course')->name('subcourses.store-link');
Route::post('/link-subcourse/{course}/{subcourse}', 'SubcourseController@linkSubCourse2Course')->name('subcourses.link-course');


//Before
Route::post('/add-subcourse-before/{course}/{subcourse}', 'SubcourseController@storeSubCourse2CourseBefore')->name('subcourses.store-link-before');
Route::post('/link-subcourse-before/{course}/{subcourse}/{subcourseBefore}', 'SubcourseController@linkSubCourse2CourseBefore')->name('subcourses.link-course-before');
//After
Route::post('/add-subcourse-after/{course}/{subcourse}', 'SubcourseController@storeSubCourse2CourseAfter')->name('subcourses.store-link-after');
Route::post('/link-subcourse-after/{course}/{subcourse}/{subcourseAfter}', 'SubcourseController@linkSubCourse2CourseAfter')->name('subcourses.link-course-after');
//Repace

Route::post('/replace-subcourse/{course}/{subcourse}', 'SubcourseController@storeSubCourse2CourseAndDetachSubcourse')->name('subcourses.replace-new');
Route::post('/replace-link-subcourse/{course}/{subcourse}/{detach}', 'SubcourseController@linkSubCourse2CourseAndDetachSubcourse')->name('subcourses.replace-link');


//Delete
Route::post('/detach-subcourse-from-course/{course}/{subcourse}', 'SubcourseController@detachSubcourseFromCourse')->name('subcourses.detach');
Route::post('/destroy-subcourse/{subcourse}', 'SubcourseController@destroy')->name('subcourses.destroy');

Route::post('/request-valid-course/{course}', 'CourseyearsubclassController@requestValidation')->name('courses.request-validation');
Route::post('/request-valid-test/{test}', 'TestyearsubclassController@requestValidation')->name('tests.request-validation');
//--------------------------------//


Route::get('/classes', 'TheClassController@list')->name('classes.list');

Route::post('/init-test/{type}', 'TestController@init')->name('tests.init');
Route::post('/confirm-test/{test}', 'TestController@confirm')->name('tests.confirm');

Route::post('/confirm-test-linked/{test}/{subclass}', 'TestController@confirmLinked')->name('tests.confirm-linked');



Route::get('/test-types/{class?}/{subject?}', 'TestController@types')->name('tests.types');
Route::get('/test-type/{type}/{language}/{class?}/{subject?}', 'TestController@type')->name('tests.type');

Route::get('/test-language/{class?}/{subject?}', 'TestController@language')->name('tests.language');

/*TEST POST*/

/*Link TEST*/
Route::get('/add-test-link/{language?}', 'TestController@addLink')->name('tests.add-link');
Route::post('/store-test-link', 'TestController@storeLink')->name('tests.store-link');
Route::get('/show-test-link-with-answers/{test}', 'TestController@showLinkWithAnswers')->name('tests.show-link-with-answers');





/*ONLINE TEST*/
Route::get('/add-online-test/{language}', 'TestController@addOnline')->name('tests.add-online');
Route::post('/post-online-test', 'TestController@storeOnline')->name('tests.store-online');

/*TEST ONLINE LINKED*/
Route::get('/add-test-online-linked/{language}/{subclass}', 'TestController@addOnlineLinked')->name('tests.add-online-linked');
Route::post('/post-test-online-linked/{subclass}', 'TestController@storeOnlineLinked')->name('tests.store-online-linked');
/* Test Images */
Route::get('/add-images-test/{language}', 'TestController@addImages')->name('tests.add-images');
Route::get('/show-test-images-with-answers/{test}', 'TestController@showImagesWithAnswers')->name('tests.show-images-with-answers');
/*TEST PDF*/
Route::get('/add-pdf-test/{language}', 'TestController@addPdf')->name('tests.add-pdf');
Route::post('/store-test-pdf', 'TestController@storePdf')->name('tests.store-pdf');
Route::get('/show-test-pdf-with-answers/{test}', 'TestController@showPdfWithAnswers')->name('tests.show-pdf-with-answers');
///IMAGE
Route::post('/test-store-images/{test}/{qa}', 'FileController@storeTestImages')->name('files.store-test-images');
Route::post('/test-drop-image/{test}/{qa}', 'FileController@dropTestImage')->name('files.drop-test-image');

///////DOCS
Route::get('/add-doc-test/{language}', 'TestController@addDoc')->name('tests.add-doc');
Route::post('/store-test-doc', 'TestController@storeDoc')->name('tests.store-doc');
Route::get('/show-test-doc-with-answers/{test}', 'TestController@showDocWithAnswers')->name('tests.show-doc-with-answers');
//Editor
Route::get('/add-editor-test/{language}', 'TestController@addEditor')->name('tests.add-editor');
Route::post('/store-test-editor', 'TestController@storeEditor')->name('tests.store-editor');
Route::get('/show-test-editor-with-answers/{test}', 'TestController@showEditorWithAnswers')->name('tests.show-editor-with-answers');

/*TEST PDF LINKED*/
Route::get('/add-pdf-test-linked/{language}/{subclass}', 'TestController@addPdfLinked')->name('tests.add-pdf-linked');
Route::post('/store-test-pdf-linked/{subclass}', 'TestController@storePdfLinked')->name('tests.store-pdf-linked');


///

Route::get('/add-test-editor-linked/{language}/{subclass}', 'TestController@addEditorLinked')->name('tests.add-editor-linked');

Route::post('/store-test-editor-linked/{subclass}', 'TestController@storeEditorLinked')->name('tests.store-editor-linked');

///

/**************TEST LINK LINKED**************/

Route::get('/add-test-link-linked/{language}/{subclass}', 'TestController@addLinkLinked')->name('tests.add-link-linked');

Route::post('/store-test-link-linked/{subclass}', 'TestController@storeLinkLinked')->name('tests.store-link-linked');

/////////TEST IMAGES LINKED////////////

Route::get('/add-images-test-linking/{language}/{subclass}', 'TestController@addImagesLinked')->name('tests.add-images-linked');

Route::get('/add-test-linked-linking/{class_id}/{subject_id}', 'TestController@addLinkedLinking')->name('tests.add-linked-linking');
Route::post('/post-test-linked-linking/{test}/{class_id}/{subject_id}', 'TestController@storeLinkedLinking')->name('tests.store-linked-linking');

Route::get('/test-show/{test}', 'TestController@show')->name('tests.show');

Route::get('/get-online-answers/{test}', 'TestController@getOnlineAnswers')->name('tests.get-online-answers');
Route::post('/post-online-answers/{test}', 'TestController@postOnlineAnswers')->name('tests.store-online-answers');
Route::get('/tests', 'TestController@index')->name('tests.index');

Route::get('/data-check-fournitures/{class}', 'FourniturationController@dataCheck')->name('fournitures.data-check-by-class');
/***********************SUBJECT*********************/

Route::get('/teatcher-subjects-by-class/{class}', 'SubjectController@teatcherSubjectsByClass')->name('subjects.teatcher-by-class');

/*******************************SUBJECT LINKED********************/

Route::get('/show-linked-subject/{class}/{subject}', 'SubjectController@showLinked')->name('subjects.show-linked');

Route::get('/data-tests-in-subclass/{subclass}', 'SubjectclassController@tests')->name('subjectclasses.tests');
Route::get('/data-classes-in-subclass/{subclass}', 'SubjectController@courses')->name('subjectclasses.courses');


/**********************************Subject and course linking******************************************************/

Route::get('/subject-course-language-linked/{class}/{subject}', 'CourseController@languageLinked')->name('courses.language-linked');
Route::get('/add-subject-course-linked/{class}/{subject}/{language?}', 'CourseController@addLinked')->name('courses.add-linked');
Route::post('/post-subject-course-linked/{class}/{subject}', 'CourseController@storeLinked')->name('courses.store-linked');

Route::get('/add-subject-course-linked-linking/{class}/{subject}', 'CourseController@addLinkedLinking')->name('courses.add-linked-linking');
Route::post('/post-subject-course-linked-linking/{course}/{class}/{subject}', 'CourseController@storeLinkedLinking')->name('courses.store-linked-linking');
/**********************************Courses**********************************************/

Route::get('/teatcher-courses/{teatcher}', 'CourseController@teatcherCourses')->name('courses.teatcher-courses');

Route::get('/teatcher-tests/{teatcher}', 'TestController@teatcherTests')->name('tests.teatcher-tests');

Route::get('/choose-subject-class', 'CourseController@choose')->name('courses.choose');

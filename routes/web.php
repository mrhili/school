<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/test', function () {
$model_name = 'App\User';
return $model_name::find(1)->name;
});

Route::get('/testtest/', 'TestController@test');

Auth::routes();


Route::get('/cal-test', 'CalendarController@test')->name('cal');



Route::group(['middleware' => ['user']], function () {

	Route::get('/home', 'HomeController@index')->name('home');

});

Route::group(['middleware' => ['student']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/change-year/{id}', 'YearController@changeYear')->name('years.change');
    Route::get('/student/{id}', 'StudentController@show')->name('students.show');
    Route::get('/student-home', 'StudentController@home')->name('students.home');
    Route::get('/student-my-tests', 'TestController@studentMyTests')->name('tests.my-tests');
    Route::get('/pass-test/{test}/{subjectclass}', 'TestController@passTest')->name('tests.pass-test');
    Route::post('/get-note/{test}/{note}', 'TestController@getNote')->name('tests.get-note');
    Route::get('/my-notes', 'NoteController@myNotes')->name('notes.my-notes');
    Route::get('/data-my-notes', 'NoteController@dataMyNotes')->name('notes.data-my-notes');

    Route::get('/my-fournitures', 'FourniturationController@myFournitures')->name('fournitures.my-fournitures');
    Route::get('/data-my-fournitures', 'FourniturationController@dataMyfournitures')->name('fournitures.data-my-fournitures');
    Route::post('/switch-exist-fourniture/{f}', 'FourniturationController@switchExist')->name('fournitures.switch-exist-fourniture');
    Route::post('/switch-confirmed-fourniture/{f}', 'FourniturationController@switchConfirmed')->name('fournitures.switch-confirmed-fourniture');
    Route::post('/switch-rejected-fourniture/{f}', 'FourniturationController@switchRejected')->name('fournitures.switch-rejected-fourniture');
});

Route::group(['middleware' => ['parent']], function () {

	Route::get('/parent-home', 'ParentController@home')->name('parents.home');

	Route::get('/student-profile/{student}', 'StudentController@profile')->name('students.profile');

    Route::get('/child-notes/{child}', 'NoteController@childNotes')->name('notes.child-notes');
    Route::get('/data-child-notes/{child}', 'NoteController@dataChildNotes')->name('notes.data-child-notes');

    Route::get('/child-fournitures/{child}', 'FourniturationController@childFournitures')->name('fournitures.child-fournitures');
    Route::get('/data-child-fournitures/{child}', 'FourniturationController@dataChildFournitures')->name('fournitures.data-child-fournitures');

});

Route::group(['middleware' => ['teatcher']], function () {

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
});

Route::group(['middleware' => ['secretaria']], function () {

	Route::get('/fournitures/{class}', 'FournitureController@byClass')->name('fournitures.by-class');
	Route::post('/link-fourniture-class/{class}/{fourniture_id}', 'FournitureController@linkClass')->name('fournitures.link-class');

	Route::get('/fournitures', 'FournitureController@list')->name('fournitures.list');
	Route::post('/store-fourniture', 'FournitureController@store')->name('fournitures.store');

	Route::get('/rooms', 'RoomController@list')->name('rooms.list');
	Route::post('/store-room/{etage}/{roomtype}', 'RoomController@store')->name('roomtypes.store');
	Route::get('/roomtypes', 'RoomtypeController@list')->name('roomtypes.list');
	Route::post('/store-roomtype', 'RoomtypeController@store')->name('roomtypes.store');
	Route::get('/etages', 'EtageController@list')->name('etages.list');
	Route::post('/store-etage', 'EtageController@store')->name('etages.store');
	//objectype
	Route::get('/objctypes', 'ObjctypeController@list')->name('objctypes.list');
	Route::post('/store-objctype', 'ObjctypeController@store')->name('objctypes.store');

	Route::get('/objcts', 'ObjctController@list')->name('objcts.list');
	Route::post('/store-objct/{room}/{objctype}', 'ObjctController@store')->name('objcts.store');

	Route::post('/add-payment-student/{id}/{payment}/{month}/{year}/{class}', 'StudentsPaymentController@addPayment')->name('students.add-payment');
	Route::post('/add-payment-user/{id}/{payment}/{month}/{year}', 'UserspaymentController@addPayment')->name('users.add-payment');

	

	Route::get('/users/{role}', 'UserController@byRole')->name('users.by-role');
	Route::get('/users-data-by-role/{role}', 'UserController@dataByRole')->name('users.data-by-role');

	Route::get('/etudients', 'StudentController@all')->name('students.all');

	Route::get('/add-student', 'StudentController@add')->name('students.add');
	Route::post('/store-student', 'StudentController@store')->name('students.store');

	Route::get('/students/{class}', 'StudentController@byClass')->name('students.by-class');
	Route::get('/students-data-by-class/{class}', 'StudentController@dataByClass')->name('students.data-by-class');



	Route::get('/parents', 'ParentController@all')->name('parents.all');

	Route::get('/subjects/{class}', 'SubjectController@byClass')->name('subjects.by-class');
	Route::post('/link-subject-class/{class}/{subject_id}', 'SubjectController@linkClass')->name('subjects.link-class');

	Route::get('/subjects', 'SubjectController@list')->name('subjects.list');
	Route::post('/store-subject', 'SubjectController@store')->name('subjects.store');

});

Route::group(['middleware' => ['admin']], function () {

	Route::get('/months-bd', 'HomeController@monthsBD')->name('home.months-bd');

});

Route::group(['middleware' => ['master']], function () {

	Route::get('/add-user/{role?}', 'UserController@add')->name('users.add');

	Route::post('/store-user', 'UserController@store')->name('users.store');

    Route::get('/configs', 'ConfigController@index')->name('configs.index');

    Route::post('/configs/store', 'ConfigController@store')->name('configs.store');

    Route::get('/configs/add', 'ConfigController@add')->name('configs.add');

    Route::post('/configs/store-config', 'ConfigController@storeConfig')->name('configs.store-config');

	Route::get('/history-master', 'HistoryController@master')->name('histories.master');

});
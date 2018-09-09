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



/* $rolesTypes = [
     'users',
     'students',
     'parents',
     'teatchers',
     'secretarias',
     'admins',
     'masters'
 ];
 */




Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/test', function () {
$model_name = 'App\User';
return $model_name::find(1)->name;
});

// Route for view/blade file.
Route::get('importExport', 'TestoController@importExport');
// Route for export/download tabledata to .csv, .xls or .xlsx
Route::get('downloadExcel/{type}', 'TestoController@downloadExcel');
// Route for import excel data to database.
Route::post('importExcel', 'TestoController@importExcel');

/*****************************/

Route::get('/testtest/', 'TestController@test');

Route::get('/testprintable', 'TestoController@printable');
Route::get('/testprintable-parent', 'TestoController@printableParent');
Route::get('/testprintable-worker', 'TestoController@printableWorker')->name('printables.worker');
Route::get('/testprintable-sheet-worker', 'TestoController@printableSheetWorker')->name('printables.sheet-worker');



Auth::routes();
/*
Route::get('/cal-test', 'CalendarController@test')->name('cal');
Route::get('/cal-test2', 'CalendarController@test2')->name('cal2');
Route::get('/cal-index', 'CalendarController@index')->name('calendars.index');
Route::post('/cal-store', 'CalendarController@store')->name('calendars.store');
Route::get('/cal-create', 'CalendarController@create')->name('calendars.create');
Route::put('/cal-edit/{cal}', 'CalendarController@edit')->name('calendars.edit');
Route::get('/cal-show/{cal}', 'CalendarController@show')->name('calendars.show');
Route::delete('/cal-dest/{cal}', 'CalendarController@destroy')->name('calendars.destroy');
*/

Route::get('demos/loaddata','HistoryController@loadData');
Route::post('demos/loaddata','HistoryController@loadDataAjax' );


Route::name('language')->get('language/{lang}', 'HomeController@language');
Route::name('language')->get('language', 'HomeController@getLanguage');

Route::group(['middleware' => ['cors']], function () {

  require __DIR__.'/webroutes/user.routes.php';

});

Route::group(['middleware' => ['user','cors']], function () {

  require __DIR__.'/webroutes/user.routes.php';

});

Route::group(['middleware' => ['student','cors']], function () {

  require __DIR__.'/webroutes/student.routes.php';

});

Route::group(['middleware' => ['parent','cors']], function () {
  require __DIR__.'/webroutes/parent.routes.php';
});

Route::group(['middleware' => ['teatcher','cors']], function () {
  require __DIR__.'/webroutes/teatcher.routes.php';
});

Route::group(['middleware' => ['secretaria','cors']], function () {

  require __DIR__.'/webroutes/secretaria.routes.php';
});

Route::group(['middleware' => ['admin','cors']], function () {

  require __DIR__.'/webroutes/admin.routes.php';

});

Route::group(['middleware' => ['master']], function () {
  require __DIR__.'/webroutes/master.routes.php';
});

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

Route::get('/facade/{cms}', 'PageController@facade')->name('pages.facade');

/*Contact*/

Route::post('/post-message', 'ContactController@send')->name('contacts.send');

/*GAMES*/
Route::get('/game', 'GameController@index')->name('games.index');
Route::get('/games/g2048', 'GameController@g2048')->name('games.g2048');
Route::get('/games/chess3d', 'GameController@chess3d')->name('games.3dchess');
Route::get('/games/gridgarden', 'GameController@gridgarden')->name('games.gridgarden');
Route::get('/games/flexfrog', 'GameController@flexfrog')->name('games.flexfrog');
Route::get('/games/sudoku', 'GameController@sudoku')->name('games.sudoku');
Route::get('/games/ttt', 'GameController@ttt')->name('games.ttt');
Route::get('/games/typing', 'GameController@typing')->name('games.typing');
Route::get('/games/fast_typing', 'GameController@fast_typing')->name('games.fast_typing');
Route::get('/games/bubble_typing', 'GameController@bubble_typing')->name('games.bubble_typing');
Route::get('/games/world_maps', 'GameController@world_maps')->name('games.world_maps');
Route::get('/games/marche_verbe', 'GameController@marche_verbe')->name('games.marche_verbe');
Route::get('/games/math', 'GameController@math')->name('games.math');
Route::get('/games/letters', 'GameController@letters')->name('games.letters');
Route::get('/games/front_face', 'GameController@front_face')->name('games.front_face');
Route::get('/games/js_quiz', 'GameController@js_quiz')->name('games.js_quiz');
Route::get('/games/quiz_collector', 'GameController@quiz_collector')->name('games.quiz_collector');
Route::get('/games/simple_quiz', 'GameController@simple_quiz')->name('games.simple_quiz');
Route::get('/games/hangman', 'GameController@hangman')->name('games.hangman');
Route::get('/games/battleship_table', 'GameController@battleship_table')->name('games.battleship_table');



/***************/

/*Applications*/
Route::get('/apps', 'ApplicationController@index')->name('applications.index');
Route::get('/app/quran', 'ApplicationController@quran')->name('applications.quran');
Route::get('/app/morse', 'ApplicationController@morse')->name('applications.morse');
Route::get('/app/triangle', 'ApplicationController@triangle')->name('applications.triangle');
Route::get('/app/quiz', 'ApplicationController@quiz')->name('applications.quiz');
Route::get('/app/math_quiz', 'ApplicationController@math_quiz')->name('applications.math_quiz');
Route::get('/app/periodic_table', 'ApplicationController@periodic_table')->name('applications.periodic_table');
Route::get('/app/atmospher', 'ApplicationController@atmospher')->name('applications.atmospher');
Route::get('/app/colors', 'ApplicationController@colors')->name('applications.colors');
Route::get('/app/multi', 'ApplicationController@multi')->name('applications.multi');
Route::get('/app/universe', 'ApplicationController@universe')->name('applications.universe');


/***************/



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

Route::group(['middleware' => ['master','cors' ]], function () {
  require __DIR__.'/webroutes/master.routes.php';
});

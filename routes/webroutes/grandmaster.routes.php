<?php


Route::get('/panel-index', 'PanelController@index')->name('panels.index');

////////////////////////TO DELETE/////////////////
///
Route::get('/gr-docs', function(){
	return 'grandmasters.docs';
})->name('grandmasters.docs');


Route::get('/gr-home', function(){
	return 'grandmasters.home';
})->name('grandmasters.home');
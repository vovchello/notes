<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/notes/show/{id}','NoteController@show')->name('notes.show');
Route::resource('note','NoteController');
Route::post('/search','SearchController@search')->name('search');
Route::get('/share/{id}','LinkShareController@index')->name('share');

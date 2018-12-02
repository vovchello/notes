<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('note','NoteController');
Route::post('/search','SearchController@search')->name('search');


<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index')->name("main");
Route::get('/login', 'LoginController@index')->name("login");
Route::get('/minor', 'HomeController@minor')->name("minor");
Route::get('/editquestions', 'EditQuestionsController@index');

// Tips route
Route::get('/tips', 'TipsController@index')->name('TipsIndex');


Route::get('foo', function () {
    return 'Hello World';
});

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
Route::get('/minor', 'HomeController@minor')->name("minor");
Route::get('foo', function () {
    return 'Hello World';
});


//TIPS User
Route::get('/first-time-user', 'HomeController@firstTimeUser')->name("first-time-user");
Route::get('/tip', 'HomeController@tip')->name("tip");
Route::get('/tip/tip-questions', 'HomeController@tipQuestions')->name("tip-questions");
Route::get('/view-previous-tips', 'HomeController@viewPreviousTips')->name("view-previous-tips");
Route::get('/previous-tip', 'HomeController@previousTip')->name("previous-tip");
Route::get('/contact-admin', 'HomeController@contactAdmin')->name("contact-admin");


//admin
Route::get('/admin-management', 'AdminController@adminManagement')->name("admin-management");
Route::get('/tips-management', 'AdminController@tipsManagement')->name("tips-management");
Route::get('/reports', 'AdminController@reports')->name("reports");
Route::get('/inactivate-user', 'AdminController@inactivateUser')->name("inactivate-user");


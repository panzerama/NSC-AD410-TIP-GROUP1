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

/***************************
 *  Tip Routing
 ***************************/
//Default Route
Route::get('/', 'TipsController@index'); // Index page route

// Create Tip
Route::get('/tip', 'TipsController@index'); // Tips Create Form P.1
Route::get('tip/questions', 'TipsController@create'); // Tips Create Form P.2
Route::post('/tip', 'TipsController@store')->name('tipStore'); // Submit and Store Tips Page
Route::get('/tip/test', 'TipsController@show');


// Prevous Tip
Route::get('/tip/previous','PreviousTipsController@index'); // Display Previous Tips List
Route::get('/tip/previous/{id}','PreviousTipsController@show'); // Display Specific Previous Tip


// Edit Tip
Route::get('/tip/edit','EditTipsController@index');
Route::get('/tip/edit/form','EditTipsController@create'); // Display Edit Tips Form
Route::post('/tip/edit','EditTipsController@store'); // Save Edit Tips Form

/***************************
 *  Login and Auth Routing
 ***************************/
// Create account 
Route::get('/account/create', 'RegistrationController@create');
Route::post('/account/create', 'RegistrationController@store');

// Login Account
//Route::get('/account/','SessionsController@index'); 
Route::get('/login' , 'SessionsController@create'); // Login Auth Form 
Route::post('/login', 'SessionsController@store' ); // Auth and Login User
Route::get('/logout', 'SessionsController@destroy'); // Log Out

/***************************
 *  Admin Routing
 ***************************/
 Route::get('/admin','AdminController@index'); // Splash Page for Admin Functions
 Route::get('/admin/create', 'AdminController@create'); // Create New Admin Form
 Route::post('/admin/create','AdminController@store'); // Submit and Store New Admin Form
 Route::get('/admin/show','AdminController@show');
 Route::post('/admin/inactivate', 'AdminController@destroy'); //Inactivate a User
 
 
 /***************************
 *  Contact Routing
 ***************************/
 
 Route::get('/contact','ContactsController@create'); // Contact Admin form.
 Route::post('/contact','ContactsController@sendEmail'); 
 
 /***************************
 *  Reporting Routing
 ***************************/
 
 Route::get('/reports','ReportsController@index'); // Reports Splash Page
 Route::get('/table','ReportsController@table'); // Display Table
 Route::get('/reports-dev','ReportsControllerDev@indexdev'); // Reports Splash Page (under development)
 Route::get('/table-dev','ReportsControllerDev@tabledev'); //Display Table (under development)
 Route::get('/summary-test','ReportsControllerDev@summarytest'); // testing data display
 Route::get('/tipsbymonth-test','ReportsControllerDev@tipsbymonthtest'); // testing data display
 Route::get('/tipsbydivision-test','ReportsControllerDev@tipsbydivisiontest'); // testing data display
 Route::get('/reports/filter','ReportsController@create'); // Show Reports Filter Form
 Route::get('/reports/results','ReportsController@show'); // Display Reports


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
Route::get('/', 'Auth\LoginController@index')->name('login'); // Main page route

// Create Tip
Route::get('/tip', 'TipsController@index')->middleware('auth:web'); // Tips Create Form P.1
Route::get('tip/questions', 'TipsController@create')->middleware('auth:web'); // Tips Create Form P.2
Route::post('/tip', 'TipsController@store')->name('tipStore')->middleware('auth:web'); // Submit and Store Tips Page
Route::get('/tip/test', 'TipsController@show')->middleware('auth:web');


// Prevous Tip
Route::get('/tip/previous','PreviousTipsController@index')->middleware('auth:web'); // Display Previous Tips List
Route::get('/tip/previous/{id}','PreviousTipsController@show')->middleware('auth:web'); // Display Specific Previous Tip


// Edit Tip
Route::get('/tip/edit','EditTipsController@index')->middleware('auth:web','auth.admin:web');
Route::get('/tip/edit/form','EditTipsController@create')->middleware('auth:web','auth.admin:web'); // Display Edit Tips Form
Route::post('/tip/edit','EditTipsController@store')->middleware('auth:web','auth.admin:web'); // Save Edit Tips Form


// Edit Tips Ajax
Route::get('/tip/edit/{id}','EditTipsAjaxController@index');
Route::post('/tip/edit/modify','EditTipsAjaxController@update');
Route::post('/tip/edit/add','EditTipsAjaxController@store');
Route::post('/tip/edit/inactivate','EditTipsAjaxController@destroy');

//Edit Division Ajax
Route::get('/division/edit','EditDivisionAjaxController@index');
Route::post('/division/edit/modify','EditDivisionAjaxController@update');
Route::post('/division/edit/add','EditDivisionAjaxController@store');
Route::post('/division/edit/inactivate','EditDivisionAjaxController@destroy');

/***************************
 *  Login and Auth Routing
 ***************************/
 // First Time User Route
Route::get('/account', 'AccountController@index')->middleware('auth:web');

// needs the post to do the update function from the controller 
// so that user details get confirmed
Route::post('/account', 'AccountController@updateFirstTime')->name('firstTimeStore')->middleware('auth:web');

// Login Controller Routing
Route::get('/login' , 'Auth\LoginController@index')->name('login'); // Login Auth Form 

// if we implement a logout button somewhere this is the place to use it to 
// destroy the session.
Route::get('/logout', 'Auth\LoginController@destroy')->name('logout')->middleware('auth:web'); // Log Out


/***************************
 *  Admin Routing
 ***************************/
 Route::get('/admin','AdminController@index')->middleware('auth:web','auth.admin:web'); // Splash Page for Admin Functions
 Route::get('/admin/create', 'AdminController@create')->middleware('auth:web','auth.admin:web');
 Route::post('/admin/show','AdminController@store')->name('adminStore')->middleware('auth:web','auth.admin:web'); // Submit and Store New Admin Form
 Route::get('/admin/show','AdminController@show')->middleware('auth:web','auth.admin:web'); //show faculty list // Create New Admin Form
 Route::get('/admin/update/{id}/{status}', 'AdminController@update')->middleware('auth:web','auth.admin:web'); //Change User Status
 
 
 /***************************
 *  Contact Routing
 ***************************/
 
 Route::get('/contact','ContactsController@create')->middleware('auth:web'); // Contact Admin form.
 Route::post('/contact','ContactsController@sendEmail')->middleware('auth:web');
 
 /***************************
 *  Reporting Routing
 ***************************/
 
 Route::get('/reports','ReportsController@index')->middleware('auth:web','auth.admin:web'); // Reports Splash Page
  Route::post('/reports/filter','ReportsController@show')->middleware('auth:web','auth.admin:web'); // filter form calls this route

 Route::get('/table','ReportsController@table')->middleware('auth:web','auth.admin:web'); // Display Table
 Route::get('/reports/filter','ReportsController@create')->middleware('auth:web','auth.admin:web'); // Show Reports Filter Form
 Route::get('/reports/results','ReportsController@show')->middleware('auth:web','auth.admin:web'); // Display Reports
 Route::get('/reports/tip/{id}','ReportsController@showTip')->middleware('auth:web','auth.admin:web'); // Display Specific Previous Tip




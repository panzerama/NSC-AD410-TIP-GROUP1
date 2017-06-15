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
<<<<<<< HEAD
//Default Route
Route::get('/', 'Auth\LoginController@index')->name('login'); // Main page route

=======
>>>>>>> search-func
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
Route::get('/account', 'AccountController@index');

// needs the post to do the update function from the controller 
// so that user details get confirmed
Route::post('/account', 'AccountController@updateFirstTime')->name('firstTimeStore');

// Login Controller Routing
Route::get('/login' , 'Auth\LoginController@index')->name('login'); // Login Auth Form 

// if we implement a logout button somewhere this is the place to use it to 
// destroy the session.
Route::get('/logout', 'Auth\LoginController@destroy')->name('logout'); // Log Out


/***************************
 *  Admin Routing
 ***************************/
 Route::get('/admin','AdminController@index'); // Splash Page for Admin Functions
 Route::get('/admin/create', 'AdminController@create');
 Route::post('/admin/show','AdminController@store')->name('adminStore'); // Submit and Store New Admin Form
 Route::get('/admin/show','AdminController@show'); //show faculty list // Create New Admin Form
 Route::get('/admin/update/{id}/{status}', 'AdminController@update'); //Change User Status
 
 
 /***************************
 *  Contact Routing
 ***************************/
 
 Route::get('/contact','ContactsController@create'); // Contact Admin form.
 Route::post('/contact','ContactsController@sendEmail'); 
 
 /***************************
 *  Reporting Routing
 ***************************/
 
 Route::get('/reports','ReportsController@index'); // Reports with base query
 Route::post('/reports/filter','ReportsController@show'); // filter form calls this route
 
 Route::get('/table','ReportsController@table'); // Display Table
 Route::get('/reports-old','ReportsControllerDev@indexold'); // Reports Splash Page (under development)
 Route::get('/table-dev','ReportsControllerDev@tabledev'); //Display Table (under development)
 Route::get('/summary-old','ReportsControllerDev@summaryold'); // testing data display
 Route::get('/tipsbymonth-test','ReportsControllerDev@tipsbymonthtest'); // testing data display
 Route::get('/tipsbydivision-test','ReportsControllerDev@tipsbydivisiontest'); // testing data display

 Route::get('/reports/results','ReportsController@show'); // Display Reports
 Route::get('/reports/tip/{id}','ReportsController@showTip'); // Display Specific Previous Tip




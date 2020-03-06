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
//
// Route::get('main/home', function () {
//     return 123;
// });
Route::get('/', 'ProjectController@index');
Route::get('/home', 'ProjectController@successlogin');
Route::get('/newregistration', 'ProjectController@Registration');
Route::post('/insert', 'ProjectController@register');
Route::get('/summary', 'ProjectController@viewSummary');
Route::get('/edit/{id}', 'ProjectController@edit');
Route::post('/update', 'ProjectController@update');
Route::get('/delete/{id}', 'ProjectController@delete');
Route::get('/report', 'ProjectController@report');
 

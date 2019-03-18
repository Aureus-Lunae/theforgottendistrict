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


//General get Routes
Route::get('/', 'IndexController@index');
Route::get('/rules', 'IndexController@rules');
Route::get('/staff', 'IndexController@staff');

Auth::routes(['verify' => true]);



//Profile Routes
Route::get('/profile', 'UserController@profile')->middleware('verified')->name('profile');
Route::get('/profile/changePassword', 'UserController@showChangePasswordForm')->middleware('verified');
Route::post('/profile/changePassword', 'UserController@changePassword')->middleware('verified');
Route::get('/profile/changeDescr', 'UserController@showChangeDescrForm')->middleware('verified');
Route::post('/profile/changeDescr', 'UserController@changeDescr')->middleware('verified');
Route::patch('/profile/avatar', 'UserController@updateAvatar')->middleware('verified');

//News Routes
Route::post('/news', 'NewsController@store')->middleware('verified', 'role:6');
Route::get('/news/create', 'NewsController@create')->middleware('verified')->name('createNews', 'role:6');
Route::get('/news/{news}/edit', 'NewsController@edit')->middleware('verified', 'role:6');
Route::patch('/news/{news}', 'NewsController@update')->middleware('verified', 'role:6');
Route::delete('/news/{news}', 'NewsController@destroy')->middleware('verified', 'role:6');
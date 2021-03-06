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
Route::get('/support', 'IndexController@support');
Route::get('/sys-brew', 'IndexController@brew');

Auth::routes(['verify' => true]);

//Profile Routes
Route::get('/profile', 'UserController@profile')->middleware('verified')->name('profile');
Route::get('/profile/changePassword', 'UserController@showChangePasswordForm')->middleware('verified');
Route::post('/profile/changePassword', 'UserController@changePassword')->middleware('verified');
Route::get('/profile/changeDescr', 'UserController@showChangeDescrForm')->middleware('verified');
Route::post('/profile/changeDescr', 'UserController@changeDescr')->middleware('verified');
Route::patch('/profile/avatar', 'UserController@updateAvatar')->middleware('verified');

//PM Routes
Route::get('/dashboard/pm/outbox', 'PMController@Outgoing');
Route::get('/dashboard/pm/{pm}/reply', 'PMController@Reply');
Route::resource('/dashboard/pm', 'PMController');

//Users Routes
Route::resource('/users', 'UsersController');
Route::delete('/users/{user}/avatar', 'UsersController@deleteAvatar');

//News Routes
Route::get('/news', 'IndexController@index')->middleware('verified', 'role:9');
Route::post('/news', 'NewsController@store')->middleware('verified', 'role:6');
Route::get('/news/create', 'NewsController@create')->middleware('verified', 'role:6')->name('createNews');
Route::get('/news/{news}/edit', 'NewsController@edit')->middleware('verified', 'role:6');
Route::get('/news/{news}', 'NewsController@show')->middleware('verified', 'role:6');
Route::patch('/news/{news}', 'NewsController@update')->middleware('verified', 'role:6');
Route::delete('/news/{news}', 'NewsController@destroy')->middleware('verified', 'role:6');

//Event Routes
Route::resource('/events', 'EventsController');

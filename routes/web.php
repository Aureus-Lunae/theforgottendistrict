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

Route::get('/', 'IndexController@index');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/master', function () {
    return view('master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//News Routes
Route::post('/news', 'newsController@store')->middleware('auth');
Route::get('/news/create', 'newsController@create')->middleware('auth')->name('createNews');
Route::get('/news/{news}/edit', 'newsController@edit')->middleware('auth');
Route::patch('/news/{news}', 'newsController@update')->middleware('auth');
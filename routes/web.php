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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
});


Route::get('/index','UserController@index');

Route::get('/update/{id}','UserController@edit');

Route::get('/towns/{id}','UserController@getTowns');

Route::get('update/towns/{id}','UserController@getTowns');

Route::get('/delete/{id}','UserController@destroy');

Route::get('/create','UserController@create');

Route::resource('/createusers','UserController');

Route::resource('/edituser','UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

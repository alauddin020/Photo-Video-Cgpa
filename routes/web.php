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
    return view('welcome');
});

//Add New Route
Route::get('/Add-New-Data','PostController@index')->name('newData');
Route::post('/Add-New-Data','PostController@store');
Route::get('/All-Result','ResultController@index')->name('result');
Route::get('/fa/{id}','PostController@edit');
Route::get('/fa','PostController@create');
Route::get('/blob:', function () {
    abort(404);
});
Route::get('/counter','PusherController@index');
Route::get('/send','PusherController@view');
Route::post('/send','PusherController@send');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

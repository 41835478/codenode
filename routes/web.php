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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/page','PagesController@home');
Route::get('/topics','TopicsController@index');
//Route::get('api/topics', 'App\Http\Api\Controllers\TopicsController@index');
Route::get('auth/github','AuthController@redirectToProvider');
Route::get('auth/github/callback', 'AuthController@handleProviderCallback');

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {

    $api->get('/topic', 'App\Http\Api\Controllers\TopicsController@index');
});
$api->version('v1', function ($api) {
    $api->post('login', [
        'as' =>'login.login',
        'uses' => 'App\Http\Api\Controllers\LoginController@login'
    ]);
});
$api->version('v1', function ($api) {
    $api->get('categories', 'App\Http\Api\Controllers\CategoriesController@index');
});
$api->version('v1',function($api){
    $api->get('reply/{id}/web_view', [
        'as' => 'replies.web_view',
        'uses' => 'TopicsController@showWebView'
    ]);
});
$api->version('v1',function($api){
    $api->get('user/{id}/web_view', [
        'as' => 'users.replies.web_view',
        'uses' => 'TopicsController@showWebView'
    ]);
});
$api->version('v1',function($api){
    $api->get('topics/{id}/web_view', [
        'as' => 'topic.web_view',
        'uses' => 'TopicsController@showWebView'
    ]);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

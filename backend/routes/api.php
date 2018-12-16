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

Route::middleware('auth:api')->group( function(){
    //Route::resource('thread', 'API\ThreadController');
});
Route::post('register', 'API\PassportController@register');
Route::post('login', 'API\PassportController@login');

Route::resource('thread', 'API\ThreadController');
Route::resource('post', 'API\PostController');
Route::resource('user', 'API\UserController');

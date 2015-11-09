<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ShortenerController@home');
Route::get('/about', 'ShortenerController@about');
Route::get('/contact', 'ShortenerController@contact');

Route::post('/short', 'ShortenerController@short_url');
Route::get('/s/{hash_value}', 'ShortenerController@goto_actual_url');

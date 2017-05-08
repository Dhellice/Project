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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/series', 'SerieController');
Route::resource('/episodes', 'EpisodeController');
Route::resource('/comments', 'CommentsController');

Route::post('/series/{serie}/comments', 'CommentsController@store');
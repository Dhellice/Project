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

//Route::get('/', function () {

//    return view('welcome');
//});

Auth::routes();
Route::get("/",'HomeController@welcome');
Route::get('/home', 'HomeController@index');
Route::resource('/series', 'SerieController');
Route::resource('/episodes', 'EpisodeController');
Route::resource('/comments', 'CommentsController');
Route::resource('/user', 'UserController');
Route::resource('/ami', 'AmiController');

Route::get('serie/like/{id}', ['as' => 'serie.like', 'uses' => 'LikeController@likeSerie']);
Route::post('/series/{serie}/comments', 'CommentsController@store');


Route::get('/contact',
    ['as' => 'contact', 'uses' => 'ContactController@create']);
Route::post('/contact',
    ['as' => 'contact_store', 'uses' => 'ContactController@store']);
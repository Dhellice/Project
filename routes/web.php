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
Route::post('/series/{serie}/notes', 'NoteController@store');
Route::post('/episodes/{episode}/notes', 'NoteEpisodeController@store');
Route::post('user', 'UserController@update_avatar');

Route::get('/categories/{categories}', ['as' => 'categories.show', 'uses' => 'CategorieController@show']);


Route::get('/admin', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
Route::get('/admin/series', ['as' => 'admin.series', 'uses' => 'AdminController@showseries']);
Route::get('/admin/series/create', ['as' => 'admin.createseries', 'uses' => 'AdminController@createseries']);
Route::post('/admin/series', ['as' => 'admin.storeseries', 'uses' => 'AdminController@storeseries']);
Route::get('/admin/series/{series}/edit', ['as' => 'admin.editseries', 'uses' => 'AdminController@editseries']);
Route::put('/admin/series/{series}', ['as' => 'admin.updateseries', 'uses' => 'AdminController@updateseries']);
Route::get('/admin/series/{series}', ['as' => 'admin.destroyseries', 'uses' => 'AdminController@destroyseries']);

Route::get('/admin/comments', ['as' => 'admin.comments', 'uses' => 'AdminController@showcomments']);
Route::get('/admin/comments/{comments}/edit', ['as' => 'admin.editcomments', 'uses' => 'AdminController@editcomments']);
Route::put('/admin/comments/{comments}', ['as' => 'admin.updatecomments', 'uses' => 'AdminController@updatecomments']);
Route::get('/admin/comments/{comments}', ['as' => 'admin.destroycomments', 'uses' => 'AdminController@destroycomments']);

Route::get('/admin/users', ['as' => 'admin.users', 'uses' => 'AdminController@showusers']);
Route::get('/admin/users/{users}/edit', ['as' => 'admin.editusers', 'uses' => 'AdminController@editusers']);
Route::put('/admin/users/{users}', ['as' => 'admin.updateusers', 'uses' => 'AdminController@updateusers']);
Route::get('/admin/users/{users}', ['as' => 'admin.destroyusers', 'uses' => 'AdminController@destroyusers']);


Route::get('user/ami/{id}', ['as' => 'user.ami', 'uses' => 'AmiController@amis']);
Route::get('serie/like/{id}', ['as' => 'serie.like', 'uses' => 'LikeController@likeSerie']);
Route::post('/series/{serie}/comments', 'CommentsController@store');


Route::get('auth/{provider}', ['as' => 'provider.login', 'uses' => 'Auth\RegisterController@redirectToProvider']);
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');


Route::get('/contact',
    ['as' => 'contact', 'uses' => 'ContactController@create']);
Route::post('/contact',
    ['as' => 'contact_store', 'uses' => 'ContactController@store']);
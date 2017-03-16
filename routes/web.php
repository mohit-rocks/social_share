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

Route::get('/', 'tasksController@index');

Route::get('about', function () {
	$tasks = DB::table('tasks')->get();
  return view('about', compact('tasks'));
});

Route::get('tasks', 'tasksController@index');
Route::get('tasks/create', 'TasksController@create');
Route::get('tasks/{task}', 'tasksController@show');
Route::post('tasks', 'TasksController@store');

Route::get('facebook-posts', 'FacebookPostController@index');
Route::get('facebook-posts/create', 'FacebookPostController@create');
Route::get('facebook-posts/{post}', 'FacebookPostController@show');
Route::post('facebook-posts', 'FacebookPostController@store');
Route::get('facebook-posts/{post}/edit', 'FacebookPostController@edit');
Route::post('facebook-posts/update', 'FacebookPostController@update');

Route::get('twitter-posts', 'TwitterPostController@index');
Route::get('twitter-posts/create', 'TwitterPostController@create');
Route::get('twitter-posts/{post}', 'TwitterPostController@show');
Route::post('twitter-posts', 'TwitterPostController@store');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');

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

Route::resource('facebook-posts', 'FacebookPostController');
Route::resource('twitter-posts', 'TwitterPostController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');

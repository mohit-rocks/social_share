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
Route::get('tasks/{task}', 'tasksController@show');

Route::get('facebook-posts', 'FacebookPostController@index');
Route::get('facebook-posts/{post}', 'FacebookPostController@show');

Route::get('twitter-posts', 'TwitterPostController@index');
Route::get('twitter-posts/{post}', 'TwitterPostController@show');

<?php

//use App\Task;
use Illuminate\Support\Facades\Route;

//Route::get('/tasks', function () {
////	$tasks = DB::table('tasks')->get();
//
//    $tasks = Task::all();
//	return view('tasks.index', compact('tasks'));
//});


//Route::get('/tasks/{id}', function($id){
////	$task = DB::table('tasks')->find($id);
//
//    $task = Task::findOrFail($id);
//	return view('tasks.show', compact('task'));
//});


//Route::get('tasks', 'TasksController@index');
//
//Route::get('tasks/{task}', 'TasksController@show');
//
//Route::get('/', 'PostController@index');
//
//Route::get('/posts/{post}', 'PostController@show');


Route::get('/', 'PostController@index');

Route::get('/posts/create', 'PostController@create');

Route::post('/posts', 'PostController@store');

Route::get('/posts/{post}', 'PostController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');


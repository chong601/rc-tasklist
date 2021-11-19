<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'TaskController@listTasks')->name('listTasks');
Route::post('/task', 'TaskController@createNewtask')->name('createNewTask');
Route::patch('/task/{taskId}', 'TaskController@toggleCompleted')->name('toggleCompleted');
Route::delete('/task/{taskId}', 'TaskController@deleteTask')->name('deleteTask');

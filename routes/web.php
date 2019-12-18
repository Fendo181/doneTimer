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

use App\TodoList;

Route::get('/', function () {
    $todoList =  TodoList::all()->where('done',1);
    return view('todo.index',['todoList' => $todoList]);
});

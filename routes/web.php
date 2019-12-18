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

Route::get('/','TodoListController@index');
Route::post('/create','TodoListController@create');
Route::delete('/delete/{id}/','TodoListController@delete');
Route::PUT('/edit/{id}/','TodoListController@edit');
Route::PUT('/update/{id}/','TodoListController@update');

//doneをupdateした際の処理
Route::PUT('/update_done/{id}/','TodoListController@updateDone');



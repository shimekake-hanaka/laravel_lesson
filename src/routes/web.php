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
// getは、第一引数のアクセスがあったらこうしてねという指示
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
// 登録時のPOST送信用
Route::post('/todo', 'TodoController@store')->name('todo.store');
// 一覧表示の表示用
Route::get('/todo', 'TodoController@index')->name('todo.index');
// 一覧表示のID取得用
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');
// 編集画面表示用
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
// 更新処理用
Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');
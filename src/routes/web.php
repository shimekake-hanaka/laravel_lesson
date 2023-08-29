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
// 新規作成画面への遷移
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
// 登録時のPOST送信用
Route::post('/todo', 'TodoController@store')->name('todo.store');
// top画面・一覧表示
Route::get('/todo', 'TodoController@index')->name('todo.index');
// 詳細表示のID取得用
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');
// 編集画面表示用
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
// 更新処理用
Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');
// 削除
Route::delete('/todo/{id}', 'TodoController@delete')->name('todo.delete');
// 完了ルート
Route::post('/todo/{id}/complete', 'TodoController@complete')->name('todo.complete');
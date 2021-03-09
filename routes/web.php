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
Route::get('/', 'TasksController@index');
// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('tasks', 'TasksController', ['only' => ['create', 'edit', 'show', 'destroy']]);
});
Route::resource('tasks', 'TasksController');

/*
// CRUD
// タスクの個別詳細ページ表示
Route::get('tasks/{id}', 'TasksController@show');
// タスクの新規作成を処理
Route::post('tasks', 'TasksController@store');
// タスクの更新処理
Route::put('tasks/{id}', 'TasksController@update');

//index: showの補助ページ
Route::get('tasks', 'TasksController@index')->name('task.index');
// create: 新規作成用のフォームページ
Route::get('tasks/create', 'TasksController@create')->name(tasks.create);
// edit: 更新用のフォームページ
Route::get('messages/{id}/edit', 'MessagesController@edit')->name(tasks.edit);
*/
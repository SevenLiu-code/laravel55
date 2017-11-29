<?php
use App\Http\Controllers\PostController;
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

Route::get('/', '\App\Http\Controllers\PostController@index');
// 文章列表页
Route::get('posts', '\App\Http\Controllers\PostController@index');
//创建文章页
Route::get('posts/create', '\App\Http\Controllers\PostController@create');
//文章展现页
Route::get('posts/{post}', '\App\Http\Controllers\PostController@show');
Route::post('posts', '\App\Http\Controllers\PostController@store');
//编辑文章页
Route::get('posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
Route::put('posts/{post}', '\App\Http\Controllers\PostController@update');
//删除文章页
Route::get('posts/delete', '\App\Http\Controllers\PostController@delete');


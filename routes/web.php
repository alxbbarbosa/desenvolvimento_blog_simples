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

Route::get('/', 'BlogController@index')->name('blog.index');
Route::get('/article/{id}', 'BlogController@article')->name('blog.article');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::any('categories/search', 'CategoryController@search')->name('categories.search');
Route::resource('categories', 'CategoryController');

Route::any('articles/search', 'ArticleController@search')->name('articles.search');
Route::resource('articles', 'ArticleController');

Route::any('comments/search', 'CommentController@search')->name('comments.search');
Route::post('comments/add', 'CommentController@add')->name('comments.add');
Route::post('comments/reply', 'CommentController@reply')->name('comments.reply');
Route::resource('comments', 'CommentController');

Route::any('pictures/search', 'PictureController@search')->name('pictures.search');
Route::resource('pictures', 'PictureController');

Route::any('users/search', 'UserController@search')->name('users.search');
Route::resource('users', 'UserController');

Route::any('roles/search', 'RoleController@search')->name('roles.search');
Route::resource('roles', 'RoleController');

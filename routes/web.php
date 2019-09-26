<?php

Route::delete('/article/{article_id}/tag/{tag}', 'ArticleController@deleteTag')->name('article.tag.delete');
Route::get('/article/tags/article/{id}', 'ArticleController@getTagsFromArticle')->name('article.tags');
Route::get('/article/comments/api/', 'ApiCommentController@index')->name('comments.api.list');
Route::get('/article/comments/api/children/{id}', 'ApiCommentController@children')->name('comments.api.list.children');

Route::post('/article/comments/api/', 'ApiCommentController@store')->name('c.store');
Route::put('/article/comments/api/{comment}', 'ApiCommentController@update');
Route::delete('/article/comments/api/{comment}', 'ApiCommentController@destroy');

Route::get('/', 'BlogController@index')->name('blog.index');
Route::get('/article/{id}', 'BlogController@article')->name('blog.article');
Route::post('comments/add-comment', 'CommentController@addComment')->name('comments.add-comment');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::any('categories/search', 'CategoryController@search')->name('categories.search');
Route::resource('categories', 'CategoryController');

Route::any('articles/search', 'ArticleController@search')->name('articles.search');
Route::resource('articles', 'ArticleController');

Route::any('comments/search', 'CommentController@search')->name('comments.search');
Route::resource('comments', 'CommentController');

Route::any('pictures/search', 'PictureController@search')->name('pictures.search');
Route::resource('pictures', 'PictureController');

Route::any('users/search', 'UserController@search')->name('users.search');
Route::resource('users', 'UserController');

Route::any('roles/search', 'RoleController@search')->name('roles.search');
Route::resource('roles', 'RoleController');

Route::get('/config', 'HomeController@editConfig')->name('config.edit');
Route::put('/config/{id}', 'HomeController@updateConfig')->name('config.update');

Route::get('/profile', 'HomeController@editProfile')->name('profile.edit');
Route::put('/profile/{id}', 'HomeController@updateProfile')->name('profile.update');

Route::get('/password', 'HomeController@editPassword')->name('password.edit');
Route::put('/password/{id}', 'HomeController@updatePassword')->name('password.update');
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'MainController@index');

Route::get('/post/create', 'PostController@create');

Route::post('/post', 'PostController@store');

Route::get('/posts/user/{id}', 'PostController@users_posts')->name('userposts');

Route::get('/post/{id}', 'PostController@single_post');


Route::get('/post/{id}', 'CommentController@index');

Route::get('/user/{id}', 'UserController@index');

Route::get('/user/profile/{id}', 'UserController@profile');

Route::get('/admin/posts', 'AdminController@posts');

Route::delete('/admin/posts/{id}', 'AdminController@delete_post')->name('delete-post');

Route::post('/admin/posts/{id}', 'AdminController@edit_post')->name('edit-post');

Route::get('/admin/users', 'AdminController@users');

Route::delete('/admin/user/{id}', 'AdminController@delete_user')->name('delete-user');

Route::post('/post/{id}', 'CommentController@create');
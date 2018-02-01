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

Route::get('/post/create', 'PostController@create')->name('postCreate');

Route::post('/post', 'PostController@store');

Route::get('/posts/user/{id}', 'PostController@users_posts')->name('userposts');

Route::get('/post/{id}', 'PostController@single_post')->name('singlePost');

Route::get('/user/{id}', 'UserController@index')->name('user');

Route::get('/profile', 'UserController@profile')->name('profile');

Route::post('/post/{id}', 'CommentController@create');
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

//Auth middleware routes

Route::group(['middleware' => ['auth']], function () {

  Route::get('/user/{id}', 'UserController@index')->name('user');

  //Posts routes

  Route::get('/post/create', 'PostController@create')->name('post.create');

  Route::post('/post', 'PostController@store')->name('post.store');

  Route::get('/post/{id}/edit', 'PostController@edit')->name('edit.post');

  Route::put('/post/update', 'PostController@update')->name('update.post');

  Route::get('/posts/user/{id}', 'PostController@users_posts')->name('userposts');

  //Comments routes

  Route::post('comment/create/{post_id}', 'CommentController@create')->name('create.comment');

  Route::get('/comment/{id}/edit', 'CommentController@edit')->name('edit.comment');

  Route::put('/comment/update', 'CommentController@update')->name('update.comment');

  //Users profiles routes

      Route::prefix('/profile')->group(function () {

          Route::get('/', 'UserController@profile')->name('profile');

          Route::get('/posts', 'UserController@userPosts')->name('user.posts');

          Route::get('/comments', 'UserController@userComments')->name('user.comments');

          Route::put('/changestatus', 'PostController@changeStatus')->name('change.status');

          Route::delete('/deletepost', 'PostController@delete')->name('delete.post');

          Route::delete('/deletecomment', 'CommentController@delete')->name('delete.comment');

          Route::delete('/deleteprofile', 'UserController@delete')->name('delete.profile');

          Route::get('/editprofile', 'UserController@edit')->name('edit.profile');

          Route::put('/updateprofile', 'UserController@update')->name('update.profile');
  });
});

//Shared routes

Route::get('/', 'PostController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', 'PostController@single_post')->name('single.post');

Route::get('/archive/{year}/{month}', 'PostController@archive')->name('archive');

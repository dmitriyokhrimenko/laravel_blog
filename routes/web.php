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


Route::group(['prefix' => App\Http\Middleware\Language::getLocale()], function(){

      //Admin part

  Route::group(['prefix' => 'admin'], function(){

      Route::group(['middleware' => 'admin'], function(){

          Route::get('/', 'Admin\AdminController@index')->name('admin');


          //Admin users routes

          Route::get('/users', 'Admin\UserController@index')->name('admin.users');

          Route::delete('/user/delete', 'Admin\UserController@delete')->name('admin.delete.user');

          //Admin posts routes

          Route::get('/posts', 'Admin\PostController@index')->name('admin.posts');

          Route::delete('/post/delete', 'Admin\PostController@delete')->name('admin.delete.post');

          //Admin comments routes

          Route::get('/comments', 'Admin\CommentController@index')->name('admin.comments');

          Route::delete('/comment/delete', 'Admin\CommentController@delete')->name('admin.delete.comment');
      });

      Auth::routes();

      Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

      Route::post('login', 'Auth\AdminLoginController@login');

      Route::any('register', function(){

          return abort(404);
      });

  });   //End admin part

    Auth::routes();

    //Auth middleware routes

    Route::group(['middleware' => ['auth']], function () {

      Route::get('/user/{id}', 'UserController@index')->name('user');

  //Posts routes

      Route::get('/post/create', 'PostController@create')->name('post.create');

      Route::post('/post', 'PostController@store')->name('post.store');

      Route::get('/post/edit/{id}', 'PostController@edit')->name('edit.post');

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

              Route::get('/delete_photo', 'UserController@deletePhoto');

              Route::delete('/deleteprofile', 'UserController@delete')->name('delete.profile');

              Route::get('/editprofile', 'UserController@edit')->name('edit.profile');

              Route::put('/updateprofile', 'UserController@update')->name('update.profile');
          });
    });

          //Shared routes

          Route::get('/', 'PostController@index')->name('home');

          Route::get('post/{id}', 'PostController@single_post')->name('single.post');

          Route::get('/archive/{year}/{month}', 'PostController@archive')->name('archive');


});

Route::get('/change_locale/{lang}', function ($lang) {

    $referer = url()->previous();
    $parse_url = parse_url($referer, PHP_URL_PATH);
    $segments = explode('/', $parse_url);

    if (in_array($segments[1], App\Http\Middleware\Language::$languages)) {

        unset($segments[1]);
    }

    if ($lang != App\Http\Middleware\Language::$defaultLanguage){
        array_splice($segments, 1, 0, $lang);
    }
    $url = request()->root().implode("/", $segments);

    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url);

})->name('locale');

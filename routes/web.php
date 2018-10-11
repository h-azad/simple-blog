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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', 'PostsController@get_post')->name('post_details');

Auth::routes();


// ADMIN
  // Unauthenticated Routes
Route::group(['prefix' => 'admin','namespace' => 'AdminControllers','as' => 'admin.'],function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
  Route::post('/login', 'Auth\AdminLoginController@login');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');
});

  // Authenticated Routes
Route::group(['prefix' => 'admin','middleware' => 'auth:admin','namespace' => 'AdminControllers','as' => 'admin.'],function(){

  Route::get('dashboard', 'AdminController@index')->name('dashboard');
  Route::get('profile', 'AdminController@profile')->name('profile');
  Route::post('profile', 'AdminController@store_profile');
  Route::post('profile/upload', 'AdminController@upload_profile_pic')->name('profile.upload');
  Route::post('profile/quote', 'AdminController@update_quote')->name('profile.quote');
  Route::post('changePassword', 'AdminController@change_password')->name('changePassword');

  Route::get('post/add', 'PostsController@create')->name('addPost');
  Route::post('post/add', 'PostsController@store');

  Route::get('post/manage', 'PostsController@index')->name('managePost');

  Route::get('post/manage/edit/{id}', 'PostsController@edit')->name('editPost');
  Route::post('post/manage/edit/{id}', 'PostsController@update');

  Route::get('post/manage/delete/{id}', 'PostsController@destroy')->name('deletePost');

});

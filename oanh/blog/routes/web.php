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

Route::get('/', 'FrontEndController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('blog.html', 'FrontEndController@blog')->name('blog');
Route::get('post.html', 'FrontEndController@post')->name('post');
Route::post('create_comment/{id}', 'FrontEndController@createComment');
// admin
//Route::get("list_category", "CategoryController@index");

/*
Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('post', 'PostController')->middleware('auth');
Route::post('ckeditor/image_upload',
      'CKEditorController@upload')->name('upload')->middleware('auth');
*/
Route::group(['middleware' => 'auth'], function() {
  Route::resource('category', 'CategoryController');
  Route::resource('post', 'PostController');
  Route::post('ckeditor/image_upload',
        'CKEditorController@upload')->name('upload');
});

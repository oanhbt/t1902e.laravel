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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin
//Route::get("list_category", "CategoryController@index");
Route::resource('category', 'CategoryController');
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

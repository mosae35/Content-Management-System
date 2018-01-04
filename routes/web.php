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

Route::get('/','FrontEndController@index');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['web','auth','admin']],function(){


//admin
    Route::get('remove_admin/{id}','UsersController@remove_admin');
    Route::get('make_admin/{id}','UsersController@make_admin');

//Posts
    Route::resource('posts','PostController');
    Route::get('posts/{id}/destroy','PostController@destroy');
    Route::get('post/trashed','PostController@trashed');
    Route::get('post/kill/{id}','PostController@kill');
    Route::get('post/restore/{id}','PostController@restore');
//Category
    Route::resource('category','CategoryController');
    Route::get('category/{id}/destroy','CategoryController@destroy');
//tags
    Route::resource('tags','TagsController');
    Route::get('tags/{id}/destroy','TagsController@destroy');
//users
    Route::resource('user','UsersController');
    Route::get('user/delete/{id}','UsersController@destroy');
    //profile
    Route::resource('profile','ProfileController');
//settings
    Route::get('settings','SettingsController@index');
    Route::post('settings/update','SettingsController@update');
});

Route::get('post/info/{slug}','FrontEndController@single_post');
Route::get('post/category/{id}','FrontEndController@category');
Route::get('single/tag/{id}','FrontEndController@tag');
Route::get('post/results','FrontEndController@search');





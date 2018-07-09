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

Route::get('/', 'PostController@show') -> name('home.postList');

Route::get('/post/{postslug}', 'PostController@postDetail') -> name('post.detail');

Route::match(['get', 'post'], '/admin/post/edit/{postslug}', 'PostController@edit') -> name('admin.edit');

Route::match(['get', 'post'], '/admin/post/new', 'PostController@newPost') -> name('admin.postNew');

Route::get('/category/{category_name}', 'CategoryController@show') -> name('category.postList');

Route::get('/search', 'PostController@search') -> name('posts.search');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

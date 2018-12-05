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

Route::get('/', 'IndexController@index');
Route::get('/category-posts/{id}', 'IndexController@CategoryPosts');
Route::get('/post-detail/{id}', 'IndexController@PostsDetail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::get('categories', 'CategoriesController@index');
    Route::get('categories/create', 'CategoriesController@create');
    Route::post('categories/store', 'CategoriesController@store');
    Route::get('categories/edit/{id}', 'CategoriesController@edit');
    Route::patch('categories/update/{id}', 'CategoriesController@update');
    Route::get('categories/delete/{id}', 'CategoriesController@destroy');
    Route::get('categories/category-related-posts/{category_id}', 'CategoriesController@categoryRelatedPosts');


    Route::get('posts', 'PostsController@index');
    Route::get('posts/create', 'PostsController@create');
    Route::get('posts/detail/{id}', 'PostsController@show');
    Route::post('posts/store', 'PostsController@store');
    Route::get('posts/edit/{id}', 'PostsController@edit');
    Route::patch('posts/update/{id}', 'PostsController@update');
    Route::get('posts/delete/{id}', 'PostsController@destroy');

});


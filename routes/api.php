<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// http://127.0.0.1:8000/api/posts?category_id=1

Route::get('/categories', 'Api\CategoriesController@index');
Route::get('/categories/{id}', 'Api\CategoriesController@relatedPosts');
Route::get('/posts', 'Api\PostsController@index');
Route::get('/posts/{id}', 'Api\PostsController@show');

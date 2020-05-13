<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Categories
Route::get('categories', 'CategoryController@index');
Route::put('categories/update/{category}', 'CategoryController@update');
Route::delete('categories/delete/{category}', 'CategoryController@destroy');
Route::get('categories/search/{category}', 'CategoryController@show');
// Products
Route::put('products/update/{product}', 'ProductController@update');
Route::post('products/store', 'ProductController@store');
Route::delete('products/delete/{product}', 'ProductController@destroy');
Route::get('products/search/{product}', 'ProductController@show');
Route::get('products/search-all/{id}', 'ProductController@all');
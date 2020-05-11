<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Categories
Route::get('categories', 'CategoryController@index');
Route::put('categories/actualizar', 'CategoryController@update');
Route::post('categories/guardar', 'CategoryController@store');
Route::delete('categories/borrar/{id}', 'CategoryController@destroy');
Route::get('categories/buscar', 'CategoryController@show');
// Products
Route::get('products', 'ProductController@index');
Route::put('products/actualizar', 'ProductController@update');
Route::post('products/guardar', 'ProductController@store');
Route::delete('products/borrar/{id}', 'ProductController@destroy');
Route::get('products/search/{id}', 'ProductController@show');
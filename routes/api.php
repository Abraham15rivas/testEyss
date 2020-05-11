<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', 'CategoryController@index');
Route::post('/updateCategory/{id}', 'CategoryController@update');
Route::delete('/deleteCategory/{id}', 'CategoryController@destroy');

Route::resource('photo', 'PhotoController');
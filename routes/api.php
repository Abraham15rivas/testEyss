<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', 'CategoryController@index'); // Muestra todas las categorías
Route::post('updateCategory/{id}', 'CategoryController@update'); // Edita una categoría
Route::delete('deleteCategory/{id}', 'CategoryController@destroy'); // Elimina una categoría



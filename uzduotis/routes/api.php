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

Route::middleware('api')->get('items', 'ProductsController@index')->name('Products.index');
Route::middleware('api')->get('/categories', 'CategoriesController@index')->name('Categories.index');

Route::middleware('api')->post('items', 'ProductsController@store')->name('Products.store');

Route::middleware('api')->post('categories', 'CategoriesController@store')->name('Categories.store');

Route::middleware('api')->get('categories/{id}/items', 'ProductsController@indexByCategory')->name('Product.index'); /*Nežinau ar taip tiksliai reikia dabar*/


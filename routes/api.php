<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('api')->get('items', 'ProductsController@Index')->name('Products.Index');
Route::middleware('api')->get('items/{id}', 'ProductsController@Show')->name('Products.Show');
Route::middleware('api')->get('categories', 'CategoriesController@Index')->name('Categories.Index');

Route::middleware('api')->get('categories/{id}/items', 'ProductsController@ItemByCategoryId')->name('Products.ItemByCategoryId');

Route::middleware('api')->post('items', 'ProductsController@Store')->name('Products.Store');

Route::middleware('api')->post('categories', 'CategoriesController@Store')->name('Categories.Store');


<?php

use App\Model\Category;
use Baum\Node;

/*
 |--------------------------------------------------------------------------
 | Site
 |--------------------------------------------------------------------------
*/
Route::get ('/', 'HomeController@index');
Route::get ('contacts', 'HomeController@contacts');

Route::get('shop/{id_category?}', 'ProductController@index');
Route::get('shop/item/{id_product}', 'ProductController@show');

Route::get('second-hand', 'SecondHandController@index');
Route::post('second-hand/create', 'SecondHandController@create');

Route::get('prognosis', 'HomeController@prognosis');
Route::get('places', 'PlacesController@index');

/*
 |--------------------------------------------------------------------------
 | Authentication
 |--------------------------------------------------------------------------
*/
Route::get ('admin/login', 'AuthController@loginAdmin');
Route::post('admin/login', 'AuthController@postLoginAdmin');
Route::get('logout', 'AuthController@logout');

/*
 |--------------------------------------------------------------------------
 | Storage file
 |--------------------------------------------------------------------------
*/
Route::get('file/{encryptName}', 'StorageController@getFile');

/*
 |--------------------------------------------------------------------------
 | Administrator panel
 |--------------------------------------------------------------------------
*/
Route::group(['prefix'=>'admin', 'middleware' => 'auth.admin'], function() {

    Route::get('/', function () {
        return view('admin/admin');
    });

    /* Category */
    Route::get('category', 'CategoryController@get');
    Route::post('category/newChild', 'CategoryController@newChild');
    Route::post('product/product-add/sel-cat', 'CategoryController@selCat');
    Route::get('category/del/{id}', 'CategoryController@adminDestroy');
    Route::post('product-edit/get-category', 'CategoryController@CategoryEditProduct');

    /* Product */
    Route::get('product/product-add', 'ProductController@addProduct');
    Route::post('product/add', 'ProductController@add');
    Route::get ('product-destroy/{id}', 'ProductController@adminDestroy');
    Route::get('product-edit/{id}', 'ProductController@editProduct');
    Route::post('product/save', 'ProductController@save');
    Route::get('product-image/{id_product}', 'ImageController@get');
    Route::post('product-image/add', 'ImageController@add');
    Route::get('product-image-remove/{id}', 'ImageController@remove');
    Route::get('product/{id_category?}', 'ProductController@get');

    /* GV */
    Route::get('rate', 'GVController@rate');
    Route::post('rateSave', 'GVController@rateSave');

    /* Second-hand */
    Route::get('second-hand', 'SecondHandController@adminIndex');
    Route::get('second-hand-destroy/{id}', 'SecondHandController@destroy');

    /* Places */
    Route::get('places', 'PlacesController@indexAdmin');
    Route::get('places/places-add', 'PlacesController@addPlaces');
    Route::post('places/add', 'PlacesController@add');
    Route::get('places/edit/{id}', 'PlacesController@editPlaces');
    Route::post('places/save', 'PlacesController@save');
    Route::get('places/del/{id}', 'PlacesController@destroy');
});

Route::get('test', function(){

});
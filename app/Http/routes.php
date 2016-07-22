<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('car', [
    'as' => 'car.all', 'uses' => 'CarController@all'
]);

Route::post('car', [
    'as' => 'car.create', 'uses' => 'CarController@create'
]);

Route::get('car/{unid}', [
    'as' => 'car.get', 'uses' => 'CarController@get'
]);

Route::put('car/{unid}', [
    'as' => 'car.update', 'uses' => 'CarController@update'
]);

Route::delete('car/{unid}', [
    'as' => 'car.delete', 'uses' => 'CarController@delete'
]);

Route::get('category', [
    'as' => 'car.category', 'uses' => 'CarController@all_category'
]);

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

Route::get('/', function () {
    return view('welcome');


});


Route::group(['middleware' => 'web', 'prefix' => 'webapi'], function(){

    Route::get('test/get_list_type', 'EntityControllers\testController@get_list_type');

    Route::get('test/add_list_type', 'EntityControllers\testController@add_list_type');

});
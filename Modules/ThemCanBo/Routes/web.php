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


Route::resource('them-can-bo', 'ThemCanBoController');
Route::post('them-can-bo', 'ThemCanBoController@postSoLuoc1')->name('themCanBoSL');

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

Route::resource('can-bo', 'CanBoController');
Route::get('danh-sach-don-vi/{id}', 'CanBoController@canBo')->name('canBoDs');
Route::get('lay-du-lieu', 'CanBoController@getlistcb')->name('getlistcb');
Route::post('post-so-luoc-1/{id}', 'CanBoController@postSoLuoc1')->name('postSoLuoc1');
Route::get('chi-tiet-can-bo/{id}', 'CanBoController@canBoDetail')->name('canBoDetail');

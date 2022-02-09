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


Route::resource('chinh-sach', 'ChinhSachController');
Route::resource('van-ban-quy-dinh', 'VanBanController');
Route::post('xoa-van-ban/{id}', array('as' => 'xoavb', 'uses' => 'VanBanController@destroy'));

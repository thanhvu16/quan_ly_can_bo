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

Route::prefix('quanlydaotao')->group(function() {
    Route::get('/', 'QuanLyDaoTaoController@index');
});
Route::resource('quan-ly-dao-tao', 'QuanLyDaoTaoController');
Route::resource('quan-ly-lop-dao-tao', 'QuanLyLopDaoTaoController');
Route::get('dang-ky-hoc-vien/{id}', 'QuanLyLopDaoTaoController@dangKyLop')->name('dangKyLop');
Route::post('them-can-bo-vao-lop/{id}', 'QuanLyLopDaoTaoController@themcbvlop')->name('themcbvlop');

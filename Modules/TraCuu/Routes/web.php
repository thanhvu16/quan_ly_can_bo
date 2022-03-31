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

Route::prefix('tracuu')->group(function() {
    Route::get('/', 'TraCuuController@index');
});
Route::resource('tra-cuu', 'TraCuuController');
Route::get('tra-cuu-nang-cao', 'TraCuuController@nangCao')->name('nangCao');
Route::get('thong-tin-ho-so', 'TraCuuController@index')->name('thongtinhs');
Route::get('khen-thuong-can-bo', 'TraCuuController@khenThuong')->name('khenThuong');
Route::get('can-bo-thuoc-dien-thanh-uy-quan-ly', 'TraCuuController@quanLy')->name('thanhUyQuanLy');
Route::get('can-bo-thuoc-dien-quan-uy-quan-ly', 'TraCuuController@quanLy')->name('quanUyQuanLy');
Route::get('can-bo-thuoc-dien-trung-uong-quan-ly', 'TraCuuController@quanLy')->name('trungUongQuanLy');
Route::get('huy-hieu-dang', 'TraCuuController@huyHieuDang')->name('huyHieuDang');


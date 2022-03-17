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

Route::prefix('cacquatrinh')->group(function() {
    Route::get('/', 'CacQuaTrinhController@index');
});
Route::get('cap-nhat-qua-trinh-dao-tao/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatQuaTrinhDaoTao');
Route::get('qua-trinh', 'CacQuaTrinhController@index')->name('quaTrinhCN');

Route::get('gia-dinh', 'CacQuaTrinhController@index')->name('giaDinh');
Route::get('cap-nhat-gia-dinh/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatGiaDinh');

Route::get('nghien-cuu', 'CacQuaTrinhController@index')->name('nghienCuu');
Route::get('cap-nhat-nghien-cuu/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatNghienCuu');


Route::get('dao-tao', 'CacQuaTrinhController@index')->name('daoTao');
Route::get('cap-nhat-dao-tao/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatDaoTao');

Route::get('ban-than-cong-tac', 'CacQuaTrinhController@index')->name('banThan');
Route::get('cap-nhat-ban-than/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatbanThan');

Route::get('nuoc-ngoai', 'CacQuaTrinhController@index')->name('nuocNgoai');
Route::get('cap-nhat-nuoc-ngoai/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatnuocNgoai');

Route::get('qua-trinh-luong', 'CacQuaTrinhController@index')->name('luong');
Route::get('cap-nhat-luong/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatLuong');

Route::get('quoc-hoi', 'CacQuaTrinhController@index')->name('quocHoi');
Route::get('cap-nhat-quoc-hoi/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatQuocHoi');

Route::get('chuc-vu-qt', 'CacQuaTrinhController@index')->name('chucVuQt');
Route::get('cap-nhat-chuc-vu-qt/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatChucVuQt');

Route::get('phu-cap-khac-cn', 'CacQuaTrinhController@index')->name('phuCapCn');
Route::get('cap-nhat-phu-cap-khac-cn/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatPhuCapCn');

Route::get('tham_nien', 'CacQuaTrinhController@index')->name('thamNien');
Route::get('cap-nhat-tham-nien/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatThamNien');

Route::get('doan-the-cn', 'CacQuaTrinhController@index')->name('doanThecn');
Route::get('cap-nhat-doan-the/{id}', 'CacQuaTrinhController@capNhatQuaTrinhDaoTao')->name('capNhatDoanThecn');


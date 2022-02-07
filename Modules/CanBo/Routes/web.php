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
Route::post('post-so-luoc-hai/{id}', 'CanBoController@postSoLuoc1')->name('postSoLuoc1');
Route::post('can-bo-danh-gia/{id}', 'CanBoController@canBoDanhGia')->name('canBoDanhGia');
Route::post('can-bo-danh-gia-tt/{id}', 'CanBoController@canBoDanhGiatt')->name('canBoDanhGiatt');
Route::post('can-bo-danh-gia-c3/{id}', 'CanBoController@canBoDanhGiac3')->name('canBoDanhGiac3');
Route::post('qua-trinh-dao-tao/{id}', 'CanBoController@quaTrinhDaoTao')->name('quaTrinhDaoTao');
Route::post('qua-trinh-cong-tac/{id}', 'CanBoController@quaTrinhCongTac')->name('quaTrinhCongTac');
Route::post('qua-trinh-nuoc-ngoai/{id}', 'CanBoController@quaTrinhNuocNgoai')->name('quaTrinhNuocNgoai');
Route::post('qua-trinh-luong/{id}', 'CanBoController@quaTrinhluong')->name('quaTrinhluong');
Route::post('qua-trinh-chuc-vu/{id}', 'CanBoController@quaTrinhChucVu')->name('quaTrinhChucVu');
Route::post('qua-trinh-chuc-vu-dang/{id}', 'CanBoController@quaTrinhChucVuDang')->name('quaTrinhChucVuDang');
Route::post('qua-trinh-can-bo/{id}', 'CanBoController@quaTrinhCanBo')->name('quaTrinhCanBo');
Route::get('chi-tiet-can-bo/{id}', 'CanBoController@canBoDetail')->name('canBoDetail');


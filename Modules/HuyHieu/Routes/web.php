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

Route::prefix('huyhieu')->group(function() {
    Route::get('/', 'HuyHieuController@index');
});
Route::resource('cap-huy-hieu-dang', 'HuyHieuController');
Route::get('danh-sach-dot-cap-huy-hieu-cho-duyet', 'HuyHieuController@DSDotCapHuyHieuDangChoDuyet')->name('DSDotCapHuyHieuDangChoDuyet');
Route::get('danh-sach-dot-cap-huy-hieu', 'HuyHieuController@DSDotCapHuyHieuDang')->name('DSDotCapHuyHieuDang');
Route::get('danh-sach-dot-cap-huy-hieu-cho-gui', 'HuyHieuController@DSDotCapHuyHieuDangChoGui')->name('DSDotCapHuyHieuDangChoGui');
Route::get('danh-sach-dot-cap-huy-hieu-da-gui', 'HuyHieuController@DSDotCapHuyHieuDangDaGui')->name('DSDotCapHuyHieuDangDaGui');
Route::get('danh-sach-dot-cap-huy-hieu-da-duyet', 'HuyHieuController@DSDotCapHuyHieuDangDaDuyet')->name('DSDotCapHuyHieuDangDaDuyet');
Route::post('them-moi-dot-cap-huy-hieu', 'HuyHieuController@themMoiDotCapHuyHieuDang')->name('themMoiDotCapHuyHieuDang');
Route::post('xoa-dot-cap-huy-hieu/{id}', 'HuyHieuController@xoaDotCap')->name('xoaDotCapHuyHieuDang');
Route::post('cap-nhat-dot-cap-huy-hieu/{id}', 'HuyHieuController@capNhatCapHuyHieuDang')->name('capNhatCapHuyHieuDang');
Route::post('gui-duyet-huy-hieu-dang/{id}', 'HuyHieuController@guiDuyet')->name('guiDuyetCapHuyHieuDang');
//cấp số
Route::get('danh-sach-cap-so-huy-hieu/{id}', 'HuyHieuController@capSoHuyHieu')->name('capSoHuyHieu');
Route::get('danh-sach-huy-hieu-can-bo/{id}', 'HuyHieuController@huyHieuCanBo')->name('huyHieuCanBo');
Route::post('cap-so-hh/{id}', 'HuyHieuController@capSo')->name('capSo');
Route::get('tim-kiem-cac-dot-cap-huy-hieu/{id}', 'HuyHieuController@cacDot')->name('cacDot');
Route::get('danh-sach-can-bo-da-duyet-huy-hieu', 'HuyHieuController@danhSachCBDaDuyetHH')->name('danhSachCBDaDuyetHH');



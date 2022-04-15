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

Route::prefix('thedang')->group(function() {
    Route::get('/', 'TheDangController@index');
});
Route::resource('cap-the-dang', 'TheDangController');
Route::get('danh-sach-dot-cap-the-cho-duyet', 'TheDangController@DSDotCapTheChoDuyet')->name('DSDotCapTheChoDuyet');
Route::get('danh-sach-dot-cap-the', 'TheDangController@DSDotCapThe')->name('DSDotCapThe');
Route::get('danh-sach-dot-cap-the-cho-gui', 'TheDangController@DSDotCapTheChoGui')->name('DSDotCapTheChoGui');
Route::get('danh-sach-dot-cap-the-da-gui', 'TheDangController@DSDotCapTheDaGui')->name('DSDotCapTheDaGui');
Route::get('danh-sach-dot-cap-the-da-duyet', 'TheDangController@DSDotCapTheDaDuyet')->name('DSDotCapTheDaDuyet');
Route::post('them-moi-dot-cap', 'TheDangController@themMoiDotCap')->name('themMoiDotCap');
Route::post('xoa-dot-cap/{id}', 'TheDangController@xoaDotCap')->name('xoaDotCap');
Route::post('cap-nhat-dot-cap/{id}', 'TheDangController@capNhatCT')->name('capNhatCT');
Route::post('gui-duyet-the-dang/{id}', 'TheDangController@guiDuyet')->name('guiDuyet');

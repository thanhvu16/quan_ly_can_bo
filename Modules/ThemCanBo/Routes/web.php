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
Route::get('tao-ho-so-can-bo', 'ThemCanBoController@create')->name('ho_so_can_bo.create');
Route::post('them-can-bo', 'ThemCanBoController@postSoLuoc1')->name('themCanBoSL');
Route::get('ho-so-can-bo', 'ThemCanBoController@index')->name('allCanBo');
Route::get('dang-vien', 'ThemCanBoController@tuoiDang')->name('tuoiDang');
Route::get('ho-so-can-bo-cho-gui-duyet', 'ThemCanBoController@choGuiDuyet')->name('ho_so_can_bo.cho_gui_duyet');
Route::get('ho-so-can-bo-da-gui-duyet', 'ThemCanBoController@daGuiDuyet')->name('ho_so_can_bo.da_gui_duyet');
Route::get('ho-so-can-bo-gui-duyet-tra-lai', 'ThemCanBoController@guiDuyetBiTraLai')->name('ho_so_can_bo.gui_duyet_bi_tra_lai');
Route::post('duyet-ho-so-can-bo', 'DuyetHoSoCanBoConTroller@store')->name('duyet_ho_so_can_bo.store');

/** ho so can bo lanh dao  **/
Route::get('ho-so-can-bo-cho-duyet', 'HoSoCanBoController@lanhDaoChoDuyet')->name('ho_so_can_bo.lanh_dao_cho_duyet');
Route::get('ho-so-can-bo-tra-lai', 'HoSoCanBoController@lanhDaoTraLai')->name('ho_so_can_bo.lanh_dao_tra_lai');
Route::post('lanh-dao-duyet', 'HoSoCanBoController@lanhDaoDuyet')->name('ho_so_can_bo.lanh_dao_duyet');

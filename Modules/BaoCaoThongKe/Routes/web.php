<?php

Route::get('thong-ke-ho-so-don-vi', 'ThongKeHoSoDonViController@index')->name('thong_ke_ho_so_don_vi.index');
Route::get('bao-cao-thong-ke', 'BaoCaoThongKeController@index')->name('bao_cao_thong_ke.index');
Route::get('xuat-bao-cao-thong-ke', 'BaoCaoThongKeController@XuatBaoCaoThongKe')->name('xuat-bao-cao-thong-ke');

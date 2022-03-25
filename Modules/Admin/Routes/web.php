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

Route::get('/', 'AdminController@index')->name('home');

Route::resource('nguoi-dung', 'NguoiDungController');
Route::resource('nhat-ky-truy-cap', 'UserLogsController');
Route::resource('Nhom-don-vi', 'NhomDonViController');
Route::post('Nhom-don-vi/delete/{id}', array('as' => 'xoanhomdonvi', 'uses' => 'NhomDonViController@destroy'));
Route::post('setDB', array('as' => 'setDB', 'uses' => 'AdminController@setDB'));
//đơn vị
Route::get('danh-sach-don-vi', 'DonViController@danhsach')->name('danhsachdonvi');
Route::get('danh-muc-he-thong', 'AdminController@danhMucHeThong')->name('danhMucHeThong');
Route::get('cau-hinh-email-don-vi', 'NguoiDungController@cauHinhEmailDonVi')->name('cau_hinh_emai_don_vi');
Route::post('cau-hinh-email-don-vi', 'NguoiDungController@luuCauHinhEmailDonVi')->name('luu_cau_hinh_email_don_vi');
Route::resource('don-vi', 'DonViController')->except('show');
Route::post('don-vi/delete/{id}', array('as' => 'xoadonvi', 'uses' => 'DonViController@destroy'));
Route::post('cap-nhat-password-email', array('as' => 'guiXuLy', 'uses' => 'NguoiDungController@guiXuLy'));
//chức vụ
Route::get('danh-sach-chuc-vu', 'ChucVuController@danhsach')->name('danhsachchucvu');
Route::resource('chuc-vu', 'ChucVuController')->except('show');
Route::post('chuc-vu/delete/{id}', array('as' => 'xoachucvu', 'uses' => 'ChucVuController@destroy'));

//Sổ văn bản
Route::get('danh-sach-so-van-ban', 'SoVanBanController@danhsach')->name('danhsachsovanban');
Route::resource('so-van-ban', 'SoVanBanController')->except('show');
Route::post('so-van-ban/delete/{id}', array('as' => 'xoasovanban', 'uses' => 'SoVanBanController@destroy'));
//Loại Văn bản
Route::get('danh-sach-loai-van-bang', 'LoaiVanBanController@danhsach')->name('danhsachloaivanban');
Route::resource('loai-van-ban', 'LoaiVanBanController')->except('show');
Route::post('loai-van-ban/delete/{id}', array('as' => 'xoaloaivanban', 'uses' => 'LoaiVanBanController@destroy'));
Route::post('loai-van-ban/dataSort', ['as' => 'loai_van_ban.dataSort', 'uses' => 'LoaiVanBanController@dataSort']);
//Độ khẩn cấp
Route::get('danh-sach-do-khan-cap', 'DoKhanController@danhsach')->name('danhsachdokhancap');
Route::resource('do-khan-cap', 'DoKhanController')->except('show');
Route::post('do-khan-cap/delete/{id}', array('as' => 'xoadokhan', 'uses' => 'DoKhanController@destroy'));
//Độ bảo mật
Route::get('danh-sach-do-bao-mat', 'DoMatController@danhsach')->name('danhsachdobaomat');
Route::resource('do-bao-mat', 'DoMatController')->except('show');
Route::post('do-bao-mat/delete/{id}', array('as' => 'xoadobaomat', 'uses' => 'DoMatController@destroy'));


//
Route::get('get-chuc-vu/{id}', 'NguoiDungController@getChucVu');
Route::get('get-don-vi/{id}', 'NguoiDungController@getDonVi');
Route::resource('vai-tro', 'VaiTroController');
Route::resource('chuc-nang', 'ChucNangController');
Route::resource('tieu-chuan', 'TieuChuanController');
Route::post('tieu-chuan/delete/{id}', array('as' => 'xoaTieuChuan', 'uses' => 'TieuChuanController@destroy'));

Route::resource('ngay-nghi', 'NgayNghiController');

Route::get('sao-luu-du-lieu', 'AdminController@exportDatabase')->name('sao-luu-du-lieu.index');
Route::post('create-backup', 'AdminController@createBackup')->name('backup.create');
Route::get('download-backup/{fileName}', 'AdminController@downloadBackup')->name('backup.download');
Route::post('delete-backup/{fileName}', 'AdminController@deleteBackup')->name('backup.destroy');

Route::get('get-list-phong-ban/{id}', 'DonViController@getListPhongBan');

Route::get('update-passwword', 'NguoiDungController@password');

// switch user
Route::post('switch-user', 'NguoiDungController@switchOtherUser')->name('user.switch_user');
Route::get('lay-thong-bao', 'NguoiDungController@layThongBao')->name('layThongBao');
Route::get('stop-switch-user', 'NguoiDungController@stopSwitchUser')->name('user.stop_switch_user');

Route::resource('email-don-vi-ngoai-he-thong', 'EmailDonViNgoaiHeThongController');
Route::post('update-all-email-don-vi-ngoai-he-thong', 'EmailDonViNgoaiHeThongController@updateAll')
    ->name('email-don-vi-ngoai-he-thong.update_all');

//cấp tổ chức

Route::resource('cap-to-chuc', 'CapToChucController');
Route::resource('khoi-co-quan', 'KhoiCoQuanController');
Route::resource('chuyen-nganh-dao-tao', 'ChuyenNganhDaoTaoController');
Route::resource('linh-vuc-nghien-cuu', 'LinhVucTaoController');
Route::resource('dan-toc', 'DanTocController');
Route::resource('doi-tuong-quan-ly', 'DoiTuongQuanLyController');
Route::resource('ton-giao', 'TonGiaoController');
Route::resource('thanh-phan-xuat-than', 'ThanhPhanXuatThanhController');
Route::resource('tinh-trang-hon-nhan', 'TinhTrangHonNhanController');
Route::resource('hang-thuong-binh', 'HangThuongBinhController');
Route::resource('danh-hieu', 'DanhHieuController');
Route::resource('quan-he-gia-dinh', 'QuanHeGiaDinhController');
Route::resource('cong-viec-chuyen-mon', 'CongViecChuyenMonController');
Route::resource('ngach-chuc-danh', 'NgachChucDanhController');
Route::resource('bac-he-so-luong', 'BacHeSoLuongController');
Route::resource('muc-luong-co-ban', 'MucLuongCoBanController');
Route::resource('loai-phu-cap', 'LoaiPhuCapController');
Route::resource('binh-bau-phan-loai-can-bo', 'PhanLoaiCanBoController');
Route::resource('khen-thuong-ky-luat', 'KhenThuongKyLuatController');
Route::resource('ly-do-di-nuoc-ngoai', 'LyDoNuocNgoaiController');
Route::resource('don-vi-to-chuc', 'CoCauToChucController');
Route::resource('hinh-thuc-dao-tao', 'HinhThucDaoTaoController');
Route::resource('hinh-thuc-thi-tuyen', 'HinhThucThiTuyenController');
Route::resource('ky-luat', 'KyLuatController');
Route::resource('hoc-ham', 'HocHamController');
Route::resource('thanh-pho', 'ThanhPhoController');
Route::resource('ngoai-ngu', 'NgoaiNguController');
Route::resource('tin-hoc', 'TinHocController');
Route::resource('chinh-tri', 'LyLuanChinhTri');
Route::resource('chuc-vu-hien-tai', 'ChucVuHienTaiController');
Route::resource('nhiem-ky-dang', 'NhiemKyDang');
Route::resource('pho-thong', 'PhoThongController');
Route::resource('trang-thai', 'TrangThaiController');
Route::resource('quan-ly-hc', 'QuanLyHanhChinhController');
Route::resource('luong-som', 'LuongSomController');
//xóa
Route::get('xoa-thanh-pho/{id}', array('as' => 'xoatp', 'uses' => 'ThanhPhoController@destroy'));
Route::get('xoa-ngoai-ngu/{id}', array('as' => 'xoann', 'uses' => 'NgoaiNguController@destroy'));
Route::get('xoa-tin-hoc/{id}', array('as' => 'xoatinhoc', 'uses' => 'TinHocController@destroy'));
Route::get('xoa-chinh-tri/{id}', array('as' => 'xoatpchinhtri', 'uses' => 'LyLuanChinhTri@destroy'));
Route::get('xoa-chuc-vu-hien-tai/{id}', array('as' => 'xoacvht', 'uses' => 'ChucVuHienTaiController@destroy'));
Route::get('xoa-nhiem-ky-dang/{id}', array('as' => 'xoankdang', 'uses' => 'NhiemKyDang@destroy'));
Route::get('xoa-pho-thong/{id}', array('as' => 'xoaphothong', 'uses' => 'PhoThongController@destroy'));
Route::get('xoa-trang-thai/{id}', array('as' => 'xoatrangthai', 'uses' => 'TrangThaiController@destroy'));
Route::get('xoa-quan-ly-hc/{id}', array('as' => 'xoahcql', 'uses' => 'QuanLyHanhChinhController@destroy'));
Route::get('xoa-luong-som/{id}', array('as' => 'xoalsom', 'uses' => 'LuongSomController@destroy'));
Route::get('xoa-ky-luat/{id}', array('as' => 'xoakyluattt', 'uses' => 'KyLuatController@destroy'));
Route::get('xoa-hinh-thi-tuyen/{id}', array('as' => 'xoahthucthituyen', 'uses' => 'HinhThucThiTuyenController@destroy'));
Route::get('xoa-hinh-thuc-dao-tao/{id}', array('as' => 'xoahthuc', 'uses' => 'HinhThucDaoTaoController@destroy'));
Route::get('sua-don-vi-to-chuc/{id}', array('as' => 'suadvtc', 'uses' => 'CoCauToChucController@edit'));
Route::get('xoa-don-vi-to-chuc/{id}', array('as' => 'suadvtc', 'uses' => 'CoCauToChucController@destroy'));
Route::post('cap-to-chuc/delete/{id}', array('as' => 'xoacaptochuc', 'uses' => 'CapToChucController@destroy'));
Route::post('khoi-co-quan/delete/{id}', array('as' => 'xoakhoicoquan', 'uses' => 'KhoiCoQuanController@destroy'));
Route::post('chuyen-nganh-dao-tao/delete/{id}', array('as' => 'xoachuyennganhdaotao', 'uses' => 'ChuyenNganhDaoTaoController@destroy'));
Route::post('linh-vuc-nghien-cuu/delete/{id}', array('as' => 'xoalinhvucnghiencuu', 'uses' => 'LinhVucTaoController@destroy'));
Route::post('dan-toc/delete/{id}', array('as' => 'xoadantoc', 'uses' => 'DanTocController@destroy'));
Route::post('doi-tuong-quan-ly/delete/{id}', array('as' => 'xoadoituongquanly', 'uses' => 'DoiTuongQuanLyController@destroy'));
Route::post('ton-giao/delete/{id}', array('as' => 'xoatongiao', 'uses' => 'TonGiaoController@destroy'));
Route::post('thanh-phan-xuat-than/delete/{id}', array('as' => 'xoaxuatthan', 'uses' => 'ThanhPhanXuatThanhController@destroy'));
Route::post('tinh-trang-hon-nhan/delete/{id}', array('as' => 'xoatinhtranghn', 'uses' => 'TinhTrangHonNhanController@destroy'));
Route::post('hang-thuong-binh/delete/{id}', array('as' => 'xoahangthuongbinh', 'uses' => 'HangThuongBinhController@destroy'));
Route::post('danh-hieu/delete/{id}', array('as' => 'xoadanhhieu', 'uses' => 'DanhHieuController@destroy'));
Route::post('quan-he-gia-dinh/delete/{id}', array('as' => 'xoaquanhe', 'uses' => 'QuanHeGiaDinhController@destroy'));
Route::post('cong-viec-chuyen-mon/delete/{id}', array('as' => 'xoacongviec', 'uses' => 'CongViecChuyenMonController@destroy'));
Route::post('ngach-chuc-danh/delete/{id}', array('as' => 'xoangach', 'uses' => 'NgachChucDanhController@destroy'));
Route::post('bac-he-so-luong/delete/{id}', array('as' => 'xoaheso', 'uses' => 'BacHeSoLuongController@destroy'));
Route::post('muc-luong-co-ban/delete/{id}', array('as' => 'xoamucluong', 'uses' => 'MucLuongCoBanController@destroy'));
Route::post('loai-phu-cap/delete/{id}', array('as' => 'xoaphucap', 'uses' => 'LoaiPhuCapController@destroy'));
Route::post('binh-bau-phan-loai-can-bo/delete/{id}', array('as' => 'xoabinhbau', 'uses' => 'PhanLoaiCanBoController@destroy'));
Route::post('khen-thuong-ky-luat/delete/{id}', array('as' => 'xoakyluat', 'uses' => 'KhenThuongKyLuatController@destroy'));
Route::post('ly-do-di-nuoc-ngoai/delete/{id}', array('as' => 'xoacnuocngoai', 'uses' => 'LyDoNuocNgoaiController@destroy'));


//tp
Route::get('cau-hinh', 'AdminController@cauHinhHeThong')->name('cauHinh');
Route::get('tai-lieu-huong-dan', 'AdminController@taiLieuHuongDan')->name('taiLieuHuongDan');
Route::get('nhat-ky-dang-nhap', 'AdminController@vetDangNhap')->name('vetDangNhap');
Route::post('xoafile/{id}', 'AdminController@xoafile')->name('xoafile');
Route::post('post-upload-tai-lieu-tham-khao', array('as' => 'postTaiLieuThamKhao', 'uses' => 'AdminController@postTaiLieuThamKhao'));
Route::post('post-cau-hinh/{id}', array('as' => 'postCauHinh', 'uses' => 'AdminController@postCauHinh'));



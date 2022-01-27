<li class="treeview {{  Route::is('chuc-nang.index')
|| Route::is('vai-tro.index') || Route::is('ngay-nghi.index') || Route::is('don-vi-to-chuc.index') || Route::is('sao-luu-du-lieu.index') || Route::is('nhat-ky-truy-cap.index')
 || Route::is('email-don-vi-ngoai-he-thong.index')|| Route::is('taiLieuHuongDan')|| Route::is('vetDangNhap')|| Route::is('cauHinh') ? 'active menu-open' : '' }} }} ">


    <a href="#">
        <i class="fa fa-cogs"></i> <span>Quản trị hệ thống</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('don-vi-to-chuc.index') ? 'active' : '' }}"><a href="{{ route('don-vi-to-chuc.index') }}"><i class="fa fa-circle-o"></i> Quản lý đơn vị chính quyền</a></li>
        <li class="{{ Route::is('vai-tro.index') ? 'active' : '' }}"><a href="{{ route('vai-tro.index') }}"><i class="fa fa-circle-o"></i>Quyền hạn</a></li>
        <li class="{{ Route::is('ngay-nghi.index') ? 'active' : '' }}"><a href="{{ route('ngay-nghi.index') }}"><i class="fa fa-circle-o"></i>Ngày nghỉ</a></li>
        <li class="{{ Route::is('cauHinh') ? 'active' : '' }}"><a href="{{ route('cauHinh') }}"><i class="fa fa-circle-o"></i>Cấu hình hệ thống</a></li>
        <li class="{{ Route::is('nhat-ky-truy-cap.index') ? 'active' : '' }}"><a href="{{ route('nhat-ky-truy-cap.index') }}"><i class="fa fa-circle-o"></i>Nhật ký hoạt động</a></li>
        <li class="{{ Route::is('vetDangNhap') ? 'active' : '' }}"><a href="{{ route('vetDangNhap') }}"><i class="fa fa-circle-o"></i>Nhật ký đăng nhập hệ thống</a></li>
        {{--        <li class="{{ Route::is('sao-luu-du-lieu.index') ? 'active' : '' }}"><a href="{{ route('sao-luu-du-lieu.index') }}"><i class="fa fa-circle-o"></i>Sao lưu dữ liệu</a></li>--}}
        <li class="{{ Route::is('taiLieuHuongDan') ? 'active' : '' }}"><a href="{{ route('taiLieuHuongDan') }}"><i class="fa fa-circle-o"></i> Tài liệu hướng dẫn sử dụng</a></li>
    </ul>
</li>

<li class="{{  Route::is('nguoi-dung.index') ? 'active' : '' }} ">
    <a href="{{route('nguoi-dung.index')}}">
        <i class="fa fa-user-plus" ></i> <span>Cập nhật cá nhân</span>
        <span class="pull-right-container">
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
            </span>
    </a>
</li>
<li class="{{  Route::is('tra-cuu.index') ? 'active' : '' }} ">
    <a href="{{route('tra-cuu.index')}}">
        <i class="fa fa-search" ></i> <span>Tra cứu</span>
        <span class="pull-right-container">
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
            </span>
    </a>
</li>
{{--<li class="{{ Route::is('danhMucHeThong')  ? 'active' : '' }} ">--}}
{{--    <a href="{{route('danhMucHeThong')}}">--}}
{{--        <i class="fa fa-user-plus"></i> <span>Quản lý danh mục hệ thống</span>--}}
{{--        <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--    </a>--}}
{{--</li>--}}
<li class="treeview {{ Route::is('cap-to-chuc.index') || Route::is('khoi-co-quan.index') || Route::is('chuyen-nganh-dao-tao.index')
|| Route::is('linh-vuc-nghien-cuu.index') || Route::is('dan-toc.index') || Route::is('doi-tuong-quan-ly.index') || Route::is('ton-giao.index')
|| Route::is('tinh-trang-hon-nhan.index') || Route::is('hang-thuong-binh.index') || Route::is('danh-hieu.index') || Route::is('quan-he-gia-dinh.index')
|| Route::is('muc-luong-co-ban.index') || Route::is('bac-he-so-luong.index') || Route::is('ngach-chuc-danh.index') || Route::is('cong-viec-chuyen-mon.index')
|| Route::is('loai-phu-cap.index') || Route::is('binh-bau-phan-loai-can-bo.index') || Route::is('khen-thuong-ky-luat.index') || Route::is('ly-do-di-nuoc-ngoai.index')
 || Route::is('thanh-phan-xuat-than.index') || Route::is('danhsachdonvi')|| Route::is('danhsachchucvu') ? 'active menu-open' : '' }} }} ">


    <a href="#">
        <i class="fa fa-university"></i> <span>Danh mục hệ thống</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('bac-he-so-luong.index') ? 'active' : '' }}"><a href="{{ route('bac-he-so-luong.index') }}"><i class="fa fa-circle-o"></i>Bậc hệ số lương</a></li>
        <li class="{{ Route::is('danhsachchucvu') ? 'active' : '' }}"><a href="{{ route('danhsachchucvu') }}"><i class="fa fa-circle-o"></i> Chức vụ</a></li>
        <li class="{{ Route::is('cap-to-chuc.index') ? 'active' : '' }}"><a href="{{ route('cap-to-chuc.index') }}"><i class="fa fa-circle-o"></i> Cấp tổ chức</a></li>
        <li class="{{ Route::is('cong-viec-chuyen-mon.index') ? 'active' : '' }}"><a href="{{ route('cong-viec-chuyen-mon.index') }}"><i class="fa fa-circle-o"></i>Công việc chuyên môn</a></li>
        <li class="{{ Route::is('chuyen-nganh-dao-tao.index') ? 'active' : '' }}"><a href="{{ route('chuyen-nganh-dao-tao.index') }}"><i class="fa fa-circle-o"></i>Chuyên ngành đào tạo</a></li>
        <li class="{{ Route::is('dan-toc.index') ? 'active' : '' }}"><a href="{{ route('dan-toc.index') }}"><i class="fa fa-circle-o"></i>Dân tộc</a></li>
        <li class="{{ Route::is('danh-hieu.index') ? 'active' : '' }}"><a href="{{ route('danh-hieu.index') }}"><i class="fa fa-circle-o"></i>Danh Hiệu</a></li>
        <li class="{{ Route::is('danhsachdonvi') ? 'active' : '' }}"><a href="{{ route('danhsachdonvi') }}"><i class="fa fa-circle-o"></i>Đơn vị hành chính</a></li>
        <li class="{{ Route::is('doi-tuong-quan-ly.index') ? 'active' : '' }}"><a href="{{ route('doi-tuong-quan-ly.index') }}"><i class="fa fa-circle-o"></i>Đối tượng quản lý</a></li>
        <li class="{{ Route::is('ngach-chuc-danh.index') ? 'active' : '' }}"><a href="{{ route('ngach-chuc-danh.index') }}"><i class="fa fa-circle-o"></i>Ngạch chức danh</a></li>
        <li class="{{ Route::is('muc-luong-co-ban.index') ? 'active' : '' }}"><a href="{{ route('muc-luong-co-ban.index') }}"><i class="fa fa-circle-o"></i>Mức lương cơ bản</a></li>
        <li class="{{ Route::is('hang-thuong-binh.index') ? 'active' : '' }}"><a href="{{ route('hang-thuong-binh.index') }}"><i class="fa fa-circle-o"></i>Hạng thương binh</a></li>
        <li class="{{ Route::is('khoi-co-quan.index') ? 'active' : '' }}"><a href="{{ route('khoi-co-quan.index') }}"><i class="fa fa-circle-o"></i>Khối cơ quan</a></li>
        <li class="{{ Route::is('linh-vuc-nghien-cuu.index') ? 'active' : '' }}"><a href="{{ route('linh-vuc-nghien-cuu.index') }}"><i class="fa fa-circle-o"></i>Lĩnh vực nghiên cứu</a></li>
        <li class="{{ Route::is('ly-do-di-nuoc-ngoai.index') ? 'active' : '' }}"><a href="{{ route('ly-do-di-nuoc-ngoai.index') }}"><i class="fa fa-circle-o"></i>Lý do đi nước ngoài</a></li>
        <li class="{{ Route::is('loai-phu-cap.index') ? 'active' : '' }}"><a href="{{ route('loai-phu-cap.index') }}"><i class="fa fa-circle-o"></i>Loại phụ cấp</a></li>
        <li class="{{ Route::is('khen-thuong-ky-luat.index') ? 'active' : '' }}"><a href="{{ route('khen-thuong-ky-luat.index') }}"><i class="fa fa-circle-o"></i>Khen thưởng kỷ luật</a></li>
        <li class="{{ Route::is('ton-giao.index') ? 'active' : '' }}"><a href="{{ route('ton-giao.index') }}"><i class="fa fa-circle-o"></i>Tôn giáo</a></li>
        <li class="{{ Route::is('binh-bau-phan-loai-can-bo.index') ? 'active' : '' }}"><a href="{{ route('binh-bau-phan-loai-can-bo.index') }}"><i class="fa fa-circle-o"></i>Phân loại cán bộ</a></li>
        <li class="{{ Route::is('thanh-phan-xuat-than.index') ? 'active' : '' }}"><a href="{{ route('thanh-phan-xuat-than.index') }}"><i class="fa fa-circle-o"></i>Thành phần xuất thân</a></li>
        <li class="{{ Route::is('tinh-trang-hon-nhan.index') ? 'active' : '' }}"><a href="{{ route('tinh-trang-hon-nhan.index') }}"><i class="fa fa-circle-o"></i>Tình trạng hôn nhân</a></li>
        <li class="{{ Route::is('quan-he-gia-dinh.index') ? 'active' : '' }}"><a href="{{ route('quan-he-gia-dinh.index') }}"><i class="fa fa-circle-o"></i>Quan hệ gia đình</a></li>
    </ul>
</li>
<li class="treeview {{ Route::is('danh-gia-can-bo.index') || Route::is('danh-gia-can-bo.create') || Route::is('danh-gia-can-bo.edit') ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-users"></i> <span>Đánh giá cán bộ</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('danh-gia-can-bo.index') ? 'active' : '' }}"><a
                href="{{ route('danh-gia-can-bo.index') }}"><i class="fa fa-circle-o"></i>Cá nhân tự đánh giá</a></li>
        {{--                    <li class="{{ Route::is('danh-gia-can-bo.create') ? 'active' : '' }}"><a href="{{ route('danh-gia-can-bo.create') }}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>--}}
        {{--                    <li class="{{ Route::is('vanbandichoso') ? 'active' : '' }}"><a href="{{ route('vanbandichoso') }}"><i class="fa fa-circle-o"></i> Danh sách chờ số</a></li>--}}
    </ul>
</li>

{{--<li class="{{ Route::is('chuc-vu.index') || Route::is('danhsachchucvu') ? 'active' : '' }}  ">--}}
{{--    <a href="{{route('danhsachchucvu')}}">--}}
{{--        <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Chức vụ</span>--}}
{{--        <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--    </a>--}}
{{--</li>--}}

{{--<li class="{{ Route::is('so-van-ban.index') || Route::is('danhsachsovanban') ? 'active' : '' }}  ">--}}
{{--    <a href="{{route('danhsachsovanban')}}">--}}
{{--        <i class="fa fa-book" aria-hidden="true"></i> <span>Sổ văn bản</span>--}}
{{--        <span class="pull-right-container">--}}

{{--            </span>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="{{ Route::is('loai-van-ban.index') || Route::is('danhsachloaivanban') ? 'active' : '' }}  ">--}}
{{--    <a href="{{route('danhsachloaivanban')}}">--}}
{{--        <i class="fa fa-database" aria-hidden="true"></i> <span>Loại văn bản</span>--}}
{{--        <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="{{ Route::is('do-bao-mat.index') || Route::is('danhsachdobaomat') ? 'active' : '' }}  ">--}}
{{--    <a href="{{route('danhsachdobaomat')}}">--}}
{{--        <i class="fa fa-shield" aria-hidden="true"></i> <span>Độ bảo mật</span>--}}
{{--        <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="{{ Route::is('do-khan-cap.index') || Route::is('danhsachdokhancap') ? 'active' : '' }}  ">--}}
{{--    <a href="{{route('danhsachdokhancap')}}">--}}
{{--        <i class="fa fa-bolt" aria-hidden="true"></i> <span>Độ khẩn cấp</span>--}}
{{--        <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="{{ Route::is('tieu-chuan.index')  ? 'active' : '' }}  ">--}}
{{--    <a href="{{route('tieu-chuan.index')}}">--}}
{{--        <i class="fa  fa-warning" aria-hidden="true"></i> <span>Tiêu chuẩn</span>--}}
{{--        <span class="pull-right-container">--}}
{{--            </span>--}}
{{--    </a>--}}
{{--</li>--}}


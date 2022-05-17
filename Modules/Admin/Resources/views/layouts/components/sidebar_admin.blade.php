<li class="treeview {{  Route::is('chuc-nang.index')
|| Route::is('vai-tro.index') || Route::is('ngay-nghi.index')  || Route::is('sao-luu-du-lieu.index') || Route::is('nhat-ky-truy-cap.index')
 || Route::is('email-don-vi-ngoai-he-thong.index')|| Route::is('taiLieuHuongDan')|| Route::is('vetDangNhap')|| Route::is('cauHinh') ? 'active menu-open' : '' }} }} ">


    <a href="#">
        <i class="fa fa-cogs"></i> <span>Quản trị hệ thống</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
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

<li class="treeview {{ Route::is('cap-to-chuc.index') || Route::is('khoi-co-quan.index') || Route::is('chuyen-nganh-dao-tao.index')
|| Route::is('linh-vuc-nghien-cuu.index') || Route::is('dan-toc.index') || Route::is('doi-tuong-quan-ly.index') || Route::is('ton-giao.index')
|| Route::is('tinh-trang-hon-nhan.index') || Route::is('hang-thuong-binh.index') || Route::is('danh-hieu.index') || Route::is('quan-he-gia-dinh.index')|| Route::is('hoc-ham.index')
|| Route::is('muc-luong-co-ban.index') || Route::is('bac-he-so-luong.index') || Route::is('ngach-chuc-danh.index') || Route::is('cong-viec-chuyen-mon.index')
|| Route::is('chinh-tri.index') || Route::is('tin-hoc.index') || Route::is('ngoai-ngu.index') || Route::is('thanh-pho.index')|| Route::is('chuc-vu-hien-tai.index')
|| Route::is('quan-ly-hc.index') || Route::is('trang-thai.index') || Route::is('pho-thong.index')|| Route::is('nhiem-ky-dang.index')|| Route::is('pho-thong.index')|| Route::is('luong-som.index')
|| Route::is('loai-phu-cap.index') || Route::is('binh-bau-phan-loai-can-bo.index') || Route::is('khen-thuong-ky-luat.index')|| Route::is('ky-luat.index') || Route::is('ly-do-di-nuoc-ngoai.index')
 || Route::is('thanh-phan-xuat-than.index') || Route::is('danhsachdonvi')|| Route::is('danhsachchucvu')|| Route::is('hinh-thuc-thi-tuyen.index')|| Route::is('hinh-thuc-dao-tao.index') ? 'active menu-open' : '' }} }} ">


    <a href="#">
        <i class="fa fa-university"></i> <span>Danh mục hệ thống</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('bac-he-so-luong.index') ? 'active' : '' }}"><a href="{{ route('bac-he-so-luong.index') }}"><i class="fa fa-circle-o"></i>Bậc hệ số lương</a></li>
        <li class="{{ Route::is('danhsachchucvu') ? 'active' : '' }}"><a href="{{ route('danhsachchucvu') }}"><i class="fa fa-circle-o"></i> Chức vụ đảng</a></li>
        <li class="{{ Route::is('chuc-vu-hien-tai.index') ? 'active' : '' }}"><a href="{{ route('chuc-vu-hien-tai.index') }}"><i class="fa fa-circle-o"></i> Chức vụ hiện tại</a></li>
        <li class="{{ Route::is('cap-to-chuc.index') ? 'active' : '' }}"><a href="{{ route('cap-to-chuc.index') }}"><i class="fa fa-circle-o"></i> Cấp tổ chức</a></li>
        <li class="{{ Route::is('chinh-tri.index') ? 'active' : '' }}"><a href="{{ route('chinh-tri.index') }}"><i class="fa fa-circle-o"></i> Lý luận chính trị</a></li>
        <li class="{{ Route::is('cong-viec-chuyen-mon.index') ? 'active' : '' }}"><a href="{{ route('cong-viec-chuyen-mon.index') }}"><i class="fa fa-circle-o"></i>Công việc chuyên môn</a></li>
        <li class="{{ Route::is('chuyen-nganh-dao-tao.index') ? 'active' : '' }}"><a href="{{ route('chuyen-nganh-dao-tao.index') }}"><i class="fa fa-circle-o"></i>Chuyên ngành đào tạo</a></li>
        <li class="{{ Route::is('dan-toc.index') ? 'active' : '' }}"><a href="{{ route('dan-toc.index') }}"><i class="fa fa-circle-o"></i>Dân tộc</a></li>
        <li class="{{ Route::is('danh-hieu.index') ? 'active' : '' }}"><a href="{{ route('danh-hieu.index') }}"><i class="fa fa-circle-o"></i>Danh Hiệu</a></li>
        <li class="{{ Route::is('danhsachdonvi') ? 'active' : '' }}"><a href="{{ route('danhsachdonvi') }}"><i class="fa fa-circle-o"></i>Đơn vị hành chính</a></li>
        <li class="{{ Route::is('doi-tuong-quan-ly.index') ? 'active' : '' }}"><a href="{{ route('doi-tuong-quan-ly.index') }}"><i class="fa fa-circle-o"></i>Đối tượng chính sách</a></li>
        <li class="{{ Route::is('ngoai-ngu.index') ? 'active' : '' }}"><a href="{{ route('ngoai-ngu.index') }}"><i class="fa fa-circle-o"></i>Ngoại ngữ</a></li>
        <li class="{{ Route::is('nhiem-ky-dang.index') ? 'active' : '' }}"><a href="{{ route('nhiem-ky-dang.index') }}"><i class="fa fa-circle-o"></i>Nhiệm kỳ đảng</a></li>
        <li class="{{ Route::is('ngach-chuc-danh.index') ? 'active' : '' }}"><a href="{{ route('ngach-chuc-danh.index') }}"><i class="fa fa-circle-o"></i>Ngạch chức danh</a></li>
        <li class="{{ Route::is('muc-luong-co-ban.index') ? 'active' : '' }}"><a href="{{ route('muc-luong-co-ban.index') }}"><i class="fa fa-circle-o"></i>Mức lương cơ bản</a></li>
        <li class="{{ Route::is('hoc-ham.index') ? 'active' : '' }}"><a href="{{ route('hoc-ham.index') }}"><i class="fa fa-circle-o"></i>Học hàm</a></li>
        <li class="{{ Route::is('hang-thuong-binh.index') ? 'active' : '' }}"><a href="{{ route('hang-thuong-binh.index') }}"><i class="fa fa-circle-o"></i>Hạng thương binh</a></li>
        <li class="{{ Route::is('hinh-thuc-dao-tao.index') ? 'active' : '' }}"><a href="{{ route('hinh-thuc-dao-tao.index') }}"><i class="fa fa-circle-o"></i>Hình thức đào tạo</a></li>
        <li class="{{ Route::is('hinh-thuc-thi-tuyen.index') ? 'active' : '' }}"><a href="{{ route('hinh-thuc-thi-tuyen.index') }}"><i class="fa fa-circle-o"></i>Hình thức thi tuyển</a></li>
        <li class="{{ Route::is('khoi-co-quan.index') ? 'active' : '' }}"><a href="{{ route('khoi-co-quan.index') }}"><i class="fa fa-circle-o"></i>Khối cơ quan</a></li>
        <li class="{{ Route::is('luong-som.index') ? 'active' : '' }}"><a href="{{ route('luong-som.index') }}"><i class="fa fa-circle-o"></i>Lương sớm</a></li>
        <li class="{{ Route::is('linh-vuc-nghien-cuu.index') ? 'active' : '' }}"><a href="{{ route('linh-vuc-nghien-cuu.index') }}"><i class="fa fa-circle-o"></i>Lĩnh vực nghiên cứu</a></li>
        <li class="{{ Route::is('ly-do-di-nuoc-ngoai.index') ? 'active' : '' }}"><a href="{{ route('ly-do-di-nuoc-ngoai.index') }}"><i class="fa fa-circle-o"></i>Lý do đi nước ngoài</a></li>
        <li class="{{ Route::is('loai-phu-cap.index') ? 'active' : '' }}"><a href="{{ route('loai-phu-cap.index') }}"><i class="fa fa-circle-o"></i>Loại phụ cấp</a></li>
        <li class="{{ Route::is('khen-thuong-ky-luat.index') ? 'active' : '' }}"><a href="{{ route('khen-thuong-ky-luat.index') }}"><i class="fa fa-circle-o"></i>Khen thưởng kỷ luật</a></li>
        <li class="{{ Route::is('ky-luat.index') ? 'active' : '' }}"><a href="{{ route('ky-luat.index') }}"><i class="fa fa-circle-o"></i>Kỷ luật</a></li>
        <li class="{{ Route::is('binh-bau-phan-loai-can-bo.index') ? 'active' : '' }}"><a href="{{ route('binh-bau-phan-loai-can-bo.index') }}"><i class="fa fa-circle-o"></i>Loại cán bộ</a></li>
        <li class="{{ Route::is('ton-giao.index') ? 'active' : '' }}"><a href="{{ route('ton-giao.index') }}"><i class="fa fa-circle-o"></i>Tôn giáo</a></li>
        <li class="{{ Route::is('tin-hoc.index') ? 'active' : '' }}"><a href="{{ route('tin-hoc.index') }}"><i class="fa fa-circle-o"></i>Tin Học</a></li>
        <li class="{{ Route::is('thanh-pho.index') ? 'active' : '' }}"><a href="{{ route('thanh-pho.index') }}"><i class="fa fa-circle-o"></i>Thành phố</a></li>
        <li class="{{ Route::is('trang-thai.index') ? 'active' : '' }}"><a href="{{ route('trang-thai.index') }}"><i class="fa fa-circle-o"></i>Trạng thái cán bộ</a></li>
        <li class="{{ Route::is('pho-thong.index') ? 'active' : '' }}"><a href="{{ route('pho-thong.index') }}"><i class="fa fa-circle-o"></i>Trình độ phổ thông</a></li>
        <li class="{{ Route::is('thanh-phan-xuat-than.index') ? 'active' : '' }}"><a href="{{ route('thanh-phan-xuat-than.index') }}"><i class="fa fa-circle-o"></i>Thành phần xuất thân</a></li>
        <li class="{{ Route::is('tinh-trang-hon-nhan.index') ? 'active' : '' }}"><a href="{{ route('tinh-trang-hon-nhan.index') }}"><i class="fa fa-circle-o"></i>Tình trạng hôn nhân</a></li>
        <li class="{{ Route::is('quan-he-gia-dinh.index') ? 'active' : '' }}"><a href="{{ route('quan-he-gia-dinh.index') }}"><i class="fa fa-circle-o"></i>Quan hệ gia đình</a></li>
        <li class="{{ Route::is('quan-ly-hc.index') ? 'active' : '' }}"><a href="{{ route('quan-ly-hc.index') }}"><i class="fa fa-circle-o"></i>Quản lý hành chính</a></li>
    </ul>
</li>

<li class="{{  Route::is('/') ? 'active' : '' }} ">
    <a href="/">
        <i class="fa fa-pie-chart" ></i> <span>Thống kê nhắc việc</span>
        <span class="pull-right-container">
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
            </span>
    </a>
</li>
<li class="treeview {{ Route::is('thongtinhs') || Route::is('quaTrinhCN') || Route::is('capNhatQuaTrinhDaoTao')|| Route::is('giaDinh')|| Route::is('capNhatGiaDinh')|| Route::is('quyhoachcbb')|| Route::is('capNhatQHCB') ||  Route::is('capNhatDaoTao')
 || Route::is('nghienCuu')|| Route::is('capNhatNghienCuu')|| Route::is('daoTao')|| Route::is('capNhatDaoTao') || Route::is('nuocNgoai') ||  Route::is('capNhatnuocNgoai')
 || Route::is('banThan') ||  Route::is('capNhatbanThan')|| Route::is('luong') ||  Route::is('capNhatLuong') || Route::is('quocHoi') || Route::is('phuCapCn') || Route::is('capNhatPhuCapCn')
 ||  Route::is('capNhatQuocHoi')||  Route::is('chucVuQt')||  Route::is('capNhatChucVuQt') || Route::is('capNhatThamNien')
 ||  Route::is('thamNien') || Route::is('capNhatDoanThecn') ||  Route::is('doanThecn')||  Route::is('quanUyQuanLy')||  Route::is('thanhUyQuanLy')||  Route::is('trungUongQuanLy')    ? 'active menu-open' : '' }}  ">
    <a href="#">
        <i class="fa  fa-users"></i> <span>Quản lý cán bộ</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('thongtinhs')  ? 'active' : '' }}"><a href="{{ route('thongtinhs') }}"><i class="fa fa-circle-o"></i>Hồ sơ cán bộ</a></li>
        <li class="{{ Route::is('trungUongQuanLy')  ? 'active' : '' }}"><a href="{{ route('trungUongQuanLy','type=1') }}"><i class="fa fa-circle-o"></i>Cán bộ trung ương</a></li>
        <li class="{{ Route::is('thanhUyQuanLy')  ? 'active' : '' }}"><a href="{{ route('thanhUyQuanLy','type=2') }}"><i class="fa fa-circle-o"></i>Cán bộ BTV thành ủy</a></li>
        <li class="{{ Route::is('quanUyQuanLy')  ? 'active' : '' }}"><a href="{{ route('quanUyQuanLy','type=3') }}"><i class="fa fa-circle-o"></i>Cán bộ BTV quận ủy</a></li>
        <li class="treeview {{ Route::is('quaTrinhCN') || Route::is('capNhatQuaTrinhDaoTao') || Route::is('giaDinh')|| Route::is('capNhatGiaDinh') || Route::is('nghienCuu')
|| Route::is('capNhatNghienCuu')|| Route::is('daoTao')|| Route::is('capNhatDaoTao') || Route::is('banThan') ||  Route::is('capNhatbanThan')||  Route::is('chucVuQt')||  Route::is('capNhatChucVuQt')
 || Route::is('nuocNgoai') ||  Route::is('capNhatnuocNgoai') || Route::is('luong') ||  Route::is('capNhatLuong')  || Route::is('quocHoi') || Route::is('capNhatDoanThecn') ||  Route::is('doanThecn')
 ||  Route::is('capNhatQuocHoi')|| Route::is('phuCapCn') || Route::is('capNhatPhuCapCn') || Route::is('quyhoachcbb')|| Route::is('capNhatQHCB') ||  Route::is('capNhatDaoTao') || Route::is('capNhatThamNien') ||  Route::is('thamNien') ||  Route::is('doanThecn')     ? 'active menu-open ' : '' }}">
            <a href="#"><i class="fa fa-circle-o"></i> Các quá trình
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu {{ Route::is('quaTrinhCN') || Route::is('giaDinh') || Route::is('nghienCuu')|| Route::is('daoTao')|| Route::is('banThan')|| Route::is('luong')
        || Route::is('nuocNgoai') || Route::is('quocHoi') || Route::is('chucVuQt') || Route::is('phuCapCn')|| Route::is('thamNien')|| Route::is('quyhoachcbb')  ? 'active menu-open' : '' }}" >
                <li class="{{ Route::is('banThan') ||  Route::is('capNhatDaoTao')  ? 'active' : '' }}"><a href="{{route('banThan','ban_than=1')}}"><i class="fa fa-circle-o"></i>Quá trình đào tạo</a></li>
                <li class="{{ Route::is('quyhoachcbb') ||   Route::is('capNhatQHCB')   ? 'active' : '' }}"><a href="{{route('quyhoachcbb','quy_hoachcb=1')}}"><i class="fa fa-circle-o"></i> Quá trình quy hoạch CB</a></li>
                <li class="{{ Route::is('banThan') ||  Route::is('capNhatbanThan')  ? 'active' : '' }}"><a href="{{route('banThan','ban_than=1')}}"><i class="fa fa-circle-o"></i> Bản thân và công tác</a></li>
                <li class="{{ Route::is('nuocNgoai') || Route::is('capNhatnuocNgoai')  ? 'active' : '' }}"><a href="{{route('nuocNgoai','nuoc_ngoai=1')}}"><i class="fa fa-circle-o"></i> Hoạt động nước ngoài</a></li>
                <li class="{{ Route::is('luong') || Route::is('capNhatLuong')  ? 'active' : '' }}"><a href="{{route('luong','luong=1')}}"><i class="fa fa-circle-o"></i> Quá Trình Lương</a></li>
                <li class="{{ Route::is('quocHoi') ||  Route::is('capNhatQuocHoi')  ? 'active' : '' }}"><a href="{{route('quocHoi','quoc_hoi=1')}}"><i class="fa fa-circle-o"></i> Tham gia Quốc Hội </a></li>
                <li class="{{ Route::is('chucVuQt') || Route::is('capNhatChucVuQt')  ? 'active' : '' }}"><a href="{{route('chucVuQt','chuc_vu=1')}}"><i class="fa fa-circle-o"></i> Chức vụ</a></li>
                <li class="{{ Route::is('quaTrinhCN')  ? 'active' : '' }}"><a href="{{route('quaTrinhCN','dang=1')}}"><i class="fa fa-circle-o"></i> Chức vụ Đảng</a></li>
                <li class="{{ Route::is('capNhatDoanThecn') ||  Route::is('doanThecn')  ? 'active' : '' }}"><a href="{{route('doanThecn','doan_the=1')}}"><i class="fa fa-circle-o"></i> Chức vụ Đoàn thể</a></li>
                <li class="{{ Route::is('capNhatThamNien') ||  Route::is('thamNien')  ? 'active' : '' }}"><a href="{{route('thamNien','tham_nien=1')}}"><i class="fa fa-circle-o"></i> PC thâm niên vượt khung</a></li>
                <li class="{{ Route::is('phuCapCn') || Route::is('capNhatPhuCapCn')  ? 'active' : '' }}"><a href="{{route('phuCapCn','phu_cap_khac=1')}}"><i class="fa fa-circle-o"></i> Diễn biến phụ cấp khác</a></li>
                <li class="{{ Route::is('nghienCuu') ||  Route::is('capNhatNghienCuu')  ? 'active' : '' }}"><a href="{{route('nghienCuu','nghien_cuu=1')}}"><i class="fa fa-circle-o"></i> Nghiên cứu khoa học</a></li>
                <li class="{{ Route::is('giaDinh') || Route::is('capNhatGiaDinh')   ? 'active' : '' }}"><a href="{{route('giaDinh','gia_dinh=1')}}"><i class="fa fa-circle-o"></i> Quan hệ gia đình</a></li>
            </ul>
        </li>
    </ul>
</li>
<li class="treeview {{ Route::is('van-ban-quy-dinh.index') || Route::is('chi-tra-chinh-sach.index') || Route::is('huyHieuDang')|| Route::is('hsdangVien          ') || Route::is('chinh-sach.index') ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-tags"></i> <span>Quản lý đảng viên</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('hsdangVien') ? 'active' : '' }}"><a href="{{route('hsdangVien','dang_vienC=1')}}"><i class="fa fa-circle-o"></i>Hồ sơ đảng viên</a></li>
        <li class="{{ Route::is('huyHieuDang') ? 'active' : '' }}"><a href="{{route('huyHieuDang')}}"><i class="fa fa-circle-o"></i>Huy hiệu đảng</a></li>
    </ul>
</li>


<li class="{{  Route::is('don-vi-to-chuc.index') || Route::is('ho_so_can_bo.create') ? 'active' : '' }} ">
    <a href="{{route('don-vi-to-chuc.index')}}">
        <i class="fa fa-android" ></i> <span>Nghiệp vụ quản lý cán bộ</span>
        <span class="pull-right-container"></span>
    </a>
</li>

<li class="treeview {{ Route::is('van-ban-quy-dinh.index') || Route::is('chi-tra-chinh-sach.index') || Route::is('chinh-sach.index') ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-book"></i> <span>Chế độ chính sách</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('van-ban-quy-dinh.index') ? 'active' : '' }}"><a href="{{route('van-ban-quy-dinh.index')}}"><i class="fa fa-circle-o"></i>Văn bản quy định</a></li>
        <li class="{{ Route::is('chinh-sach.index') ? 'active' : '' }}"><a href="{{route('chinh-sach.index')}}"><i class="fa fa-circle-o"></i>Các chính sách</a></li>
        <li class="{{ Route::is('chi-tra-chinh-sach.index') ? 'active' : '' }}"><a href="{{route('chi-tra-chinh-sach.index')}}"><i class="fa fa-circle-o"></i>Quản lý chi trả chính sách</a></li>
        {{--                    <li class="{{ Route::is('danh-gia-can-bo.create') ? 'active' : '' }}"><a href="{{ route('danh-gia-can-bo.create') }}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>--}}
        {{--                    <li class="{{ Route::is('vanbandichoso') ? 'active' : '' }}"><a href="{{ route('vanbandichoso') }}"><i class="fa fa-circle-o"></i> Danh sách chờ số</a></li>--}}
    </ul>
</li>

<li class="{{  Route::is('khenThuong') ||  Route::is('CNkhenThuong')  ? 'active' : '' }} ">
    <a href="{{route('khenThuong')}}">
        <i class="fa fa-shirtsinbulk" ></i> <span>Khen Thưởng</span>
        <span class="pull-right-container"></span>
    </a>
</li>
<li class="treeview {{ Route::is('quan-ly-dao-tao.index') || Route::is('quan-ly-lop-dao-tao.index')  ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-book"></i> <span>Quản lý đào tạo</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('quan-ly-lop-dao-tao.index') ? 'active' : '' }}"><a href="{{route('quan-ly-lop-dao-tao.index')}}"><i class="fa fa-circle-o"></i>Quản lý lớp đào tạo</a></li>
        <li class="{{ Route::is('quan-ly-dao-tao.index') ? 'active' : '' }}"><a href="{{route('quan-ly-dao-tao.index')}}"><i class="fa fa-circle-o"></i>Quản lý học viên đăng lý</a></li>
    </ul>
</li>


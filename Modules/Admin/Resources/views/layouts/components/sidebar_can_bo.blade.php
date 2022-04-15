<li class="treeview {{ Route::is('DSDotCapThe') || Route::is('cap-the-dang.index')|| Route::is('DSDotCapTheChoGui')|| Route::is('DSDotCapTheDaGui')|| Route::is('DSDotCapTheDaDuyet') ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa fa-tags" ></i> <span>Quản lý đảng viên</span>
        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('DSDotCapThe') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapThe') }}"><i class="fa fa-circle-o"></i>Thêm mới đợt cấp thẻ</a>
        </li>
        <li class="{{ Route::is('cap-the-dang.index') ? 'active' : '' }}">
            <a href="{{ route('cap-the-dang.index') }}"><i class="fa fa-circle-o"></i>Lập danh sách cấp thẻ</a>
        </li>
        <li class="{{ Route::is('DSDotCapTheChoGui') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapTheChoGui') }}"><i class="fa fa-circle-o"></i>Danh sách cấp thẻ chờ gửi</a>
        </li>
        <li class="{{ Route::is('DSDotCapTheDaGui') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapTheDaGui') }}"><i class="fa fa-circle-o"></i>Danh sách cấp thẻ đã gửi</a>
        </li>
        <li class="{{ Route::is('DSDotCapTheDaDuyet') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapTheDaDuyet') }}"><i class="fa fa-circle-o"></i>Danh sách cấp thẻ đã duyệt</a>
        </li>
        <li class="{{ Route::is('bao_cao_thong_ke.index') ? 'active' : '' }}">
            <a href="{{ route('bao_cao_thong_ke.index') }}"><i class="fa fa-circle-o"></i>In thẻ đảng</a>
        </li>
    </ul>
</li>
<li class="treeview {{ Route::is('DSDotCapHuyHieuDang') || Route::is('cap-huy-hieu-dang.index')|| Route::is('DSDotCapHuyHieuDangChoGui')|| Route::is('DSDotCapHuyHieuDangDaGui')|| Route::is('DSDotCapHuyHieuDangDaDuyet') ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-shirtsinbulk" ></i> <span>Huy hiệu đảng</span>
        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('DSDotCapHuyHieuDang') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapHuyHieuDang') }}"><i class="fa fa-circle-o"></i>Thêm mới đợt cấp huy hiệu</a>
        </li>
        <li class="{{ Route::is('cap-huy-hieu-dang.index') ? 'active' : '' }}">
            <a href="{{ route('cap-huy-hieu-dang.index') }}"><i class="fa fa-circle-o"></i>Lập danh sách cấp huy hiệu</a>
        </li>
        <li class="{{ Route::is('DSDotCapHuyHieuDangChoGui') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapHuyHieuDangChoGui') }}"><i class="fa fa-circle-o"></i>D/scấp huy hiệu chờ gửi</a>
        </li>
        <li class="{{ Route::is('DSDotCapHuyHieuDangDaGui') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapHuyHieuDangDaGui') }}"><i class="fa fa-circle-o"></i>D/s cấp huy hiệu đã gửi</a>
        </li>
        <li class="{{ Route::is('DSDotCapHuyHieuDangDaDuyet') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapHuyHieuDangDaDuyet') }}"><i class="fa fa-circle-o"></i>D/s cấp huy hiệu đã duyệt</a>
        </li>
        <li class="{{ Route::is('bao_cao_thong_ke.index') ? 'active' : '' }}">
            <a href="{{ route('bao_cao_thong_ke.index') }}"><i class="fa fa-circle-o"></i>In huy hiệu đảng</a>
        </li>
    </ul>
</li>

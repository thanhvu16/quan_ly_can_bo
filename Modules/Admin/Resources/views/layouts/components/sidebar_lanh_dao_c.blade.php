<li class="treeview {{ Route::is('DSDotCapTheChoDuyet') || Route::is('cap-the-dang.index')|| Route::is('DSDotCapTheChoGui')|| Route::is('DSDotCapTheDaGui')|| Route::is('DSDotCapTheDaDuyet') ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa fa-tags" ></i> <span>Quản lý đảng viên</span>
        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('DSDotCapTheChoDuyet') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapTheChoDuyet') }}"><i class="fa fa-circle-o"></i>Duyệt và cấp số thẻ</a>
        </li>
        <li class="{{ Route::is('DSDotCapTheDaDuyet') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapTheDaDuyet') }}"><i class="fa fa-circle-o"></i>Danh sách cấp thẻ đã duyệt</a>
        </li>
        <li class="{{ Route::is('bao_cao_thong_ke.index') ? 'active' : '' }}">
            <a href="{{ route('bao_cao_thong_ke.index') }}"><i class="fa fa-circle-o"></i>In thẻ đảng</a>
        </li>
    </ul>
</li>
<li class="treeview {{ Route::is('DSDotCapHuyHieuDangChoDuyet') || Route::is('DSDotCapHuyHieuDangDaDuyet')|| Route::is('capSoHuyHieu') ? 'active menu-open' : '' }}  ">
    <a href="#">
        <i class="fa fa-shirtsinbulk" ></i> <span>Huy hiệu đảng</span>
        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('DSDotCapHuyHieuDangChoDuyet') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapHuyHieuDangChoDuyet') }}"><i class="fa fa-circle-o"></i>Duyệt và cấp số huy hiệu</a>
        </li>
        <li class="{{ Route::is('DSDotCapHuyHieuDangDaDuyet') ? 'active' : '' }}">
            <a href="{{ route('DSDotCapHuyHieuDangDaDuyet') }}"><i class="fa fa-circle-o"></i>D/s cấp huy hiệu đã duyệt</a>
        </li>
        <li class="{{ Route::is('bao_cao_thong_ke.index') ? 'active' : '' }}">
            <a href="{{ route('bao_cao_thong_ke.index') }}"><i class="fa fa-circle-o"></i>In huy hiệu đảng</a>
        </li>
    </ul>
</li>

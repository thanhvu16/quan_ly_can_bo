<li class="treeview {{ Route::is('van-ban-lanh-dao-xu-ly.index') || Route::is('phan-loai-van-ban.da_phan_loai') ? 'active menu-open' : '' }}">
    <a href="#">
        <i class="fa fa-th" aria-hidden="true"></i> <span>Hồ sơ công việc</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('van-ban-lanh-dao-xu-ly.index') ? 'active' : '' }}"><a
                href="{{ route('van-ban-lanh-dao-xu-ly.index') }}"><i class="fa fa-circle-o"></i>Văn bản chờ xử lý</a>
        </li>
        <li class="{{ Route::is('phan-loai-van-ban.da_phan_loai') ? 'active' : '' }}"><a
                href="{{ route('phan-loai-van-ban.da_phan_loai') }}"><i class="fa fa-circle-o"></i>Văn bản đã chỉ đạo</a>
        </li>
    </ul>
</li>
<li class="treeview {{ Route::is('van-ban-di.index') || Route::is('van-ban-di.create') || Route::is('van-ban-di.edit') || Route::is('danh_sach_vb_di_cho_duyet') ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-file-text"></i> <span>Văn bản đi</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('van-ban-di.index') ? 'active' : '' }}"><a href="{{ route('van-ban-di.index') }}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
        <li class="{{ Route::is('van-ban-di.create') ? 'active' : '' }}"><a href="{{ route('van-ban-di.create') }}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
        <li class="{{ Route::is('danh_sach_vb_di_cho_duyet') ? 'active' : '' }}"><a href="{{ route('danh_sach_vb_di_cho_duyet') }}"><i class="fa fa-circle-o"></i> văn bản đi chờ duyệt</a></li>
        <li class="{{ Route::is('vb_di_da_duyet') ? 'active' : '' }}"><a href="{{ route('vb_di_da_duyet') }}"><i class="fa fa-circle-o"></i> văn bản đi đã duyệt</a></li>
    </ul>
</li>
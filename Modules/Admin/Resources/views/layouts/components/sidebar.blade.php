<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ !empty(auth::user()->anh_dai_dien) ? getUrlFile(auth::user()->anh_dai_dien) : asset('images/default-user.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth::user()->ho_ten ?? 'N/A' }}</p>
                <a href="#"><i class="fa fa-user"></i> {{auth::user()->chucVu->ten_chuc_vu ?? ''}}</a><br>
            </div>
        </div>


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU CHỨC NĂNG</li>

            @role(QUAN_TRI_HT)
            @include('admin::layouts.components.sidebar_admin')
            @endrole

            @if(!auth::user()->hasRole(QUAN_TRI_HT) && auth::user()->donVi->parent_id != 0)
            <li class="treeview {{  Route::is('allCanBo') || Route::is('ho_so_can_bo.cho_gui_duyet')
                || Route::is('ho_so_can_bo.da_gui_duyet') || Route::is('ho_so_can_bo.create') ||
                Route::is('ho_so_can_bo.gui_duyet_bi_tra_lai') || Route::is('ho_so_can_bo.lanh_dao_cho_duyet')
                || Route::is('ho_so_can_bo.lanh_dao_tra_lai')
                ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa  fa-users"></i>
                    <span>Quản lý hồ sơ cán bộ</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(auth::user()->hasRole([CAN_BO]))
                        <li class="{{ Route::is('ho_so_can_bo.create') ? 'active' : '' }}">
                            <a href="{{ route('ho_so_can_bo.create') }}"><i class="fa fa-circle-o"></i>Nhập hồ sơ cán bộ</a>
                        </li>
                        <li class="{{ Route::is('ho_so_can_bo.cho_gui_duyet') ? 'active' : '' }}">
                            <a href="{{ route('ho_so_can_bo.cho_gui_duyet') }}"><i class="fa fa-circle-o"></i>Hồ sơ chờ gửi duyệt</a>
                        </li>
                        <li class="{{ Route::is('ho_so_can_bo.da_gui_duyet') ? 'active' : '' }}">
                            <a href="{{ route('ho_so_can_bo.da_gui_duyet') }}"><i class="fa fa-circle-o"></i>Hồ sơ đã gửi duyệt</a>
                        </li>
                        <li class="{{ Route::is('ho_so_can_bo.gui_duyet_bi_tra_lai') ? 'active' : '' }}">
                            <a href="{{ route('ho_so_can_bo.gui_duyet_bi_tra_lai') }}"><i class="fa fa-circle-o"></i>Hồ sơ gửi duyệt bị trả lại</a>
                        </li>
                    @endif
                    @if(auth::user()->hasRole([LANH_DAO]))
                        <li class="{{ Route::is('ho_so_can_bo.lanh_dao_cho_duyet') ? 'active' : '' }}">
                            <a href="{{ route('ho_so_can_bo.lanh_dao_cho_duyet') }}"><i class="fa fa-circle-o"></i>Hồ sơ chờ duyệt</a>
                        </li>
                        <li class="{{ Route::is('ho_so_can_bo.lanh_dao_tra_lai') ? 'active' : '' }}">
                            <a href="{{ route('ho_so_can_bo.lanh_dao_tra_lai') }}"><i class="fa fa-circle-o"></i>Hồ sơ cán bộ đã gửi trả lại</a>
                        </li>
                        @endif
                        <li class="{{ Route::is('allCanBo') ? 'active' : '' }}">
                            <a href="{{ route('allCanBo') }}"><i class="fa fa-circle-o"></i>Danh sách hồ sơ</a>
                        </li>
                </ul>
            </li>

            <li class="{{  Route::is('don-vi-to-chuc.index') ? 'active' : '' }} ">
                <a href="{{route('don-vi-to-chuc.index')}}">
                    <i class="fa fa-android" ></i> <span>Nghiệp vụ quản lý cán bộ</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>



                {{--            <li class="{{  Route::is('allCanBo') ? 'active' : '' }} ">--}}
{{--                <a href="{{route('allCanBo')}}">--}}
{{--                    <i class="fa  fa-user" ></i> <span>Thông tin hồ sơ cán bộ</span>--}}
{{--                    <span class="pull-right-container"></span>--}}
{{--                </a>--}}
{{--            </li>--}}
            @endif
            @if(auth::user()->hasRole([CAN_BO]))
                @include('admin::layouts.components.sidebar_can_bo')

            @endif
            @if(auth::user()->hasRole([LANH_DAO]))
                @include('admin::layouts.components.sidebar_lanh_dao_c')
            @endif
{{--            <li class="{{  Route::is('don-vi-to-chuc.index') ? 'active' : '' }} ">--}}
{{--                <a href="{{route('don-vi-to-chuc.index')}}">--}}
{{--                    <i class="fa fa-bank" ></i> <span>Nghiệp vụ quản lý cán bộ</span>--}}
{{--                    <span class="pull-right-container"></span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="treeview {{ Route::is('tra-cuu.index') || Route::is('nangCao') ? 'active menu-open' : '' }} }} ">
                <a href="#">
                    <i class="fa fa-search"></i> <span>Tìm kiếm</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Route::is('tra-cuu.index') ? 'active' : '' }}"><a href="{{route('tra-cuu.index','tracuu=5')}}"><i class="fa fa-circle-o"></i>Tìm kiếm nhanh</a></li>
                    <li class="{{ Route::is('nangCao') ? 'active' : '' }}"><a href="{{route('nangCao')}}"><i class="fa fa-circle-o"></i>Tìm kiếm nâng cao</a></li>
                </ul>
            </li>

            <li class="treeview {{ Route::is('thong_ke_ho_so_don_vi.index') || Route::is('bao_cao_thong_ke.index') ? 'active menu-open' : '' }} }} ">
                <a href="#">
                    <i class="fa fa-bar-chart" ></i> <span>Tổng hợp, báo cáo</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Route::is('thong_ke_ho_so_don_vi.index') ? 'active' : '' }}">
                        <a href="{{ route('thong_ke_ho_so_don_vi.index') }}"><i class="fa fa-circle-o"></i>Thông kê chung</a>
                    </li>
                    <li class="{{ Route::is('bao_cao_thong_ke.index') ? 'active' : '' }}">
                        <a href="{{ route('bao_cao_thong_ke.index') }}"><i class="fa fa-circle-o"></i>Báo cáo thống kê</a>
                    </li>
                </ul>
            </li>

            @if(auth::user()->hasRole([VAN_THU_DON_VI, VAN_THU_HUYEN]))
                <li class="{{ Route::is('cau_hinh_emai_don_vi') ? 'active menu-open' : '' }}">
                    <a  href="{{route('cau_hinh_emai_don_vi')}}">
                        <i class="fa fa-unlock" ></i> <span>Cấu hình email đơn vị</span>
                        <span class="pull-right-container">

            </span>
                    </a>
                </li>
            @endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


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


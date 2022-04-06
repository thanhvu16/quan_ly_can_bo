
{{--@extends('admin::layouts.master')--}}
{{--@section('page_title', 'Cán bộ')--}}
{{--@section('content')--}}

{{--@endsection--}}
{{--@section('script')--}}


{{--@endsection--}}
{{--<style>--}}
{{--    fieldset {--}}
{{--        border-color: #F00;--}}
{{--        border-style: solid;--}}
{{--    }--}}

{{--    /*legend {*/--}}
{{--    /*    background-color: gray;*/--}}
{{--    /*    color: white;*/--}}
{{--    /*    padding: 5px 10px;*/--}}
{{--    /*}*/--}}

{{--    /*input {*/--}}
{{--    /*    margin: 5px;*/--}}
{{--    /*}*/--}}
{{--</style>--}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page_title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('theme/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('theme/dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ url('theme/plugins/iCheck/all.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- toastr -->
    <link rel="stylesheet" href="{{ url('theme/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/ha_noi.png') }}" type="image/x-icon">
    <link href="{{ url('theme/plugins/loadingModal/css/jquery.loadingModal.css')}}" rel="stylesheet" />
    <link href="{{ url('theme/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
    <link href="{{ url('theme/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="{{ url('theme/bower_components/morris.js/morris.css') }}" rel="stylesheet" />
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/css/jquery.treegrid.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
       label * {
            font-size: 12px;
        }
    </style>
@yield('css')
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <a href="#" class="sidebar-toggle sidebar-customize" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle sidebar-mobile" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <a href="/" class="logo-customize">
                <img src="{{ asset('images/logo-hanoi.svg') }}" alt="" class="brand-logo">
                <div class="logo-text">
                    <span class="above-text lg-text text-uppercase">BAN THƯỜNG VỤ THÀNH ỦY</span>
                    <span class="text-uppercase">HỆ THỐNG QUẢN LÝ HỒ SƠ</span>
                </div>
            </a>


            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa fa-home"> Menu chức năng</i></a>
                    </li>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img
                                src="{{ !empty(auth::user()->anh_dai_dien) ? getUrlFile(auth::user()->anh_dai_dien) : asset('images/default-user.png') }}"
                                class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ auth::user()->ho_ten ?? 'N/A' }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img
                                    src="{{ !empty(auth::user()->anh_dai_dien) ? getUrlFile(auth::user()->anh_dai_dien) : asset('images/default-user.png') }}"
                                    class="img-circle" alt="User Image">

                                <p>
                                    {{ auth::user()->ho_ten }} ({{ auth::user()->chucVu->ten_viet_tat ?? 'N/A' }})
                                    - {{ auth::user()->donVi->ten_don_vi ?? '' }}
                                    <small>{{ date('d/m') }}. {{ date('Y') }}</small>


                                    <a style="cursor: pointer;color: white" onclick="doiMatKhau()"><i class="fa  fa-unlock"></i> Đổi mật khẩu sso</a>

                                </p>
                                <p>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    @if(session()->has('origin_user'))
                                        <a href="{{ route('user.stop_switch_user') }}"
                                           class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Trở về văn thư</a>
                                    @else
                                        <a href="{{ route('nguoi-dung.edit', auth::user()->id) }}"
                                           class="btn btn-default btn-flat">Thông tin</a>

                                    @endif
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat" id="sso-logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Đăng xuất</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    @include('canbo::components.siderbar')


    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="col-md-12 mt-4">
                    <div id="avartar-img" style="max-height:250px">
                        <img id="avartar"
                             src="{{ isset($canBo) && !empty($canBo->anh_dai_dien) ? getUrlFile($canBo->anh_dai_dien) : asset('images/default-user.png') }}"
                             class="img-responsive"  onclick="document.getElementsByName('anh_dai_dien')[0].click();"
                             alt="anh-dai-dien" title="Nhấn vào để thay đổi ảnh" style="margin: auto;cursor: pointer" >
                        <input type="file" name="anh_dai_dien" form="form3" class="hidden" onchange="readURL(this,'#avartar');">

                    </div>
                <p class="text-muted text-center">{{ $canBo->chu_danh }}</p>
            </div>
            <form  action="{{route('canBoDanhGiatt',$canBo->id)}}" method="POST" id="form3" enctype="multipart/form-data">
                @csrf
            <div class="col-md-12" style="font-size: 12px">
                <div class="row">
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">Thông tin cơ bản
                                @can(\App\Common\AllPermission::suaCanBo())
                                <button  class="btn btn-primary btn-sm btn-update-item" form="form3"><b><i class="fa fa-check-square-o"></i> </b></button>
                            @endcan</li>
                        <li class="treeview active menu-open ">
                            <a href="#">
                                <i class="fa fa-home"></i> <span>Đơn vị : {{ $canBo->donVi->ten_don_vi }}</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                        <li class="treeview active menu-open ">
                            <a href="#">
                                <i class="fa fa-tags"></i> <span>Số thẻ Đảng : {{ $canBo->so_the_dang  ?? ''}}</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                        <li class=" active menu-open ">
                            <a href="#">
                                <i class="fa  fa-bank"></i> <span>Trung ương quản lý :&emsp; <input  {{$canBo->trung_uong_quan_ly == 1 ? 'checked' : ''}} type="checkbox" value="1" form="form3" name="trung_uong_quan_ly"></span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                        <li class=" active menu-open ">
                            <a href="#">
                                <i class="fa  fa-archive"></i> <span>Làm công tác quản lý :&emsp; <input {{$canBo->lam_cong_tac_quan_ly == 1 ? 'checked' : ''}} type="checkbox" value="1" form="form3" name="lam_cong_tac_quan_ly"></span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                        <li class=" active menu-open ">
                            <a href="{{ asset('uploads/phieu-can-bo/'.$canBo->id.'_phieu_can_bo.docx') }}"><i class="fa fa-file-word-o"></i> <span> In lý lịch.docx</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
{{--                        <li class=" active menu-open ">--}}
{{--                            <a ><i class="fa fa-file-word-o"></i> <span> Trạng thái: </span>--}}
{{--                                <span class="pull-right-container"></span>--}}
{{--                                <select name="trang_thai_cb" id="" style="text-align: center;color: black">--}}
{{--                                    @foreach($trangThai as $dstrangThai)--}}
{{--                                        <option value="{{$dstrangThai->id}}"  {{$canBo->trang_thai_cb == $dstrangThai->id ? 'selected' : ''}}>{{$dstrangThai->ten}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </a>--}}

{{--                        </li>--}}
                    </ul>
                </div>
            </div>
            </form>
            <div class="col-md-12">
                <div class="row">
                    <ul class="sidebar-menu">
                        <li class="header">Cán bộ trong phòng</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12" style="font-size: 12px;" >
                <div class="row">
                    <ul class="sidebar-menu" style="max-height:280px;  overflow:auto">
                        @forelse ($canBoDV as $key=>$data1)
                            <li class="treeview  " @if($data1->id == $canBo->id) style="background: #3c8dbc;color: white" @endif  >
                                <a href="{{route('canBoDetail',$data1->id)}}">
                                    <i class="fa  fa-user"></i> <span style="color:white">{{$data1->ho_ten ?? ''}}</span>
                                    <span class="pull-right-container"></span>
                                </a>
                            </li>
                        @empty
                            <td colspan="6" class="text-center">Không tìm thấy dữ liệu.</td>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
        </section>
        <!-- /.sidebar -->
    </aside>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content" style="font-size: 12px">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="{{ empty(Request::get('activity')) || Request::get('activity') == 'activity' ? 'active' : null }}"><a href="#activity" data-toggle="tab">Sơ lược (1)</a></li>
                            <li class="{{ Request::get('activity') == 'activity2' ? 'active' : null }}"><a href="#activity2" data-toggle="tab">Sơ lược (2)</a></li>
                            <li class="{{ Request::get('activity') == 'activity3' ? 'active' : null }}"><a href="#activity3" data-toggle="tab">Sơ lược (3)</a></li>
                            <li class="{{ Request::get('activity') == 'activity4' ? 'active' : null }}"><a href="#activity4" data-toggle="tab">Đào tạo - Công tác - Nước ngoài (4)</a></li>
                            <li class="{{ Request::get('activity') == 'activity5' ? 'active' : null }}"><a href="#activity5" data-toggle="tab">Lương - Chức vụ - Quy hoạch (5)</a></li>
                            <li class="{{ Request::get('activity') == 'activity6' ? 'active' : null }}"><a href="#activity6" data-toggle="tab">Biên chế, hợp đồng - Kiêm nhiệm, biệt phái (6)</a></li>
                            <li class="{{ Request::get('activity') == 'activity7' ? 'active' : null }}"><a href="#activity7" data-toggle="tab">Khen thưởng (7)</a></li>
                            <li class="{{ Request::get('activity') == 'activity8' ? 'active' : null }}"><a href="#activity8" data-toggle="tab">Thông tin thêm (8)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane {{ empty(Request::get('activity')) || Request::get('activity') == 'activity' ? 'active in' : null }}" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <div class="tab-pane" >
                                        @include('canbo::components.soluoc1')
                                    </div>
                                </div>
                                <div class="post clearfix">
                                    <div class="user-block">

                                    </div>
                                </div>
                            </div>
                            <div class=" tab-pane {{ Request::get('activity') == 'activity2' ? 'active in' : null }}" id="activity2">
                                <!-- Post -->
                                <div class="post">
                                    <div class="tab-pane" >
                                        @include('canbo::components.soluoc2')
                                    </div>
                                </div>
                                <div class="post clearfix">
                                    <div class="user-block">

                                    </div>
                                </div>
                            </div>
                            <div class=" tab-pane {{ Request::get('activity') == 'activity3' ? 'active in' : null }}" id="activity3">
                                <!-- Post -->
                                <div class="post">
                                    <div class="tab-pane" >
                                        @include('canbo::components.soluoc3a')
                                    </div>
                                </div>
                                <div class="post clearfix">
                                    <div class="user-block">

                                    </div>
                                </div>
                            </div>
                            <div class=" tab-pane {{ Request::get('activity') == 'activity4' ? 'active in' : null }}" id="activity4">
                                <!-- Post -->
                                <div class="post">
                                    <div class="tab-pane" >
                                        @include('canbo::components.soluoc4')
                                    </div>
                                </div>
                                <div class="post clearfix">
                                    <div class="user-block">

                                    </div>
                                </div>
                            </div>
                            <div class=" tab-pane {{ Request::get('activity') == 'activity5' ? 'active in' : null }}" id="activity5">
                                <!-- Post -->
                                <div class="post">
                                    <div class="tab-pane" >
                                        @include('canbo::components.soluoc5')
                                    </div>
                                </div>
                                <div class="post clearfix">
                                    <div class="user-block">

                                    </div>
                                </div>
                            </div>
                            <div class=" tab-pane {{ Request::get('activity') == 'activity6' ? 'active in' : null }}" id="activity6">
                                <!-- Post -->
                                <div class="post">
                                    <div class="tab-pane" >
                                        @include('canbo::components.soluoc6')
                                    </div>
                                </div>
                                <div class="post clearfix">
                                    <div class="user-block">

                                    </div>
                                </div>
                            </div>
                            <div class=" tab-pane {{ Request::get('activity') == 'activity7' ? 'active in' : null }}" id="activity7">
                                <!-- Post -->
                                <div class="post">
                                    <div class="tab-pane" >
                                        @include('canbo::components.soluoc7')
                                    </div>
                                </div>
                                <div class="post clearfix">
                                    <div class="user-block">

                                    </div>
                                </div>
                            </div>
                            <div class=" tab-pane {{ Request::get('activity') == 'activity8' ? 'active in' : null }}" id="activity8">
                                <!-- Post -->
                                <div class="post">
                                    <div class="tab-pane" >
                                        @include('canbo::components.soluoc8')
                                    </div>
                                </div>
                                <div class="post clearfix">
                                    <div class="user-block">

                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                @include('canbo::components.time')
                            </div>
                            @include('canbo::components.upload')
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
    @include('admin::layouts.components.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{ url('theme/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('theme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('theme/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('theme/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ url('theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ url('theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ url('theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('theme/bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{ url('theme/dist/js/demo.js') }}"></script>--}}
<script src="{{ url('theme/plugins/toastr/toastr.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ url('theme/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ url('theme/dist/js/pages/charts/loader.js') }}"></script>
<!-- Select2 -->
<script src="{{ url('theme/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{url('theme/plugins/loadingModal/js/jquery.loadingModal.js')}}"></script>
<script src="{{url('theme/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!---moment js-->
<script src="{{ url('theme/bower_components/moment/min/moment.min.js') }}"></script>
<!-- Morris Chart js-->
<script src="{{ url('theme/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ url('theme/bower_components/morris.js/morris.min.js') }}"></script>
<!--chart js-->
<script src="{{ url('theme/plugins/chartjs/Chart.bundle.js') }}"></script>

<script src="{{ url('theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('theme/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
{{--<script src=" http://14.177.182.250:10603/sso/js/sso.min.js "></script>--}}
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    window.flashMessages = [];

    @if ($message = session('success'))
    toastr.success("{{ $message }}");

    @elseif ($message = session('warning'))
    toastr.warning("{{ $message }}");

    @elseif ($message = session('error'))
    toastr.error("{{ $message }}");

    @elseif ($message = session('info'))
    toastr.info("{{ $message }}");
    @endif

        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<script src="{{ url('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/js/jquery.treegrid.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/treegrid/bootstrap-table-treegrid.min.js"></script>


<script type="text/javascript">
    function showModal() {
        $("#myModal").modal('show');
    }
    function showModal12() {
        $("#myModal12").modal('show');
    }
    function showModal2() {
        console.log(1);
        $("#myModal2").modal('show');
    }
    function showModal3() {
        console.log(1);
        $("#myModal3").modal('show');
    }
    function showModal4() {
        console.log(1);
        $("#myModal4").modal('show');
    }
    function showModal5() {
        console.log(1);
        $("#myModal5").modal('show');
    }
    function showModal6() {
        console.log(1);
        $("#myModal6").modal('show');
    }
    function showModal7() {
        console.log(1);
        $("#myModal7").modal('show');
    }
    function showModal8() {
        console.log(1);
        $("#myModal8").modal('show');
    }
    function showModal9() {
        console.log(1);
        $("#myModal9").modal('show');
    }
    function showModal10() {
        console.log(1);
        $("#myModal10").modal('show');
    }
    function showModal11() {
        console.log(1);
        $("#myModal11").modal('show');
    }
    function showModal12() {
        console.log(1);
        $("#myModal12").modal('show');
    }
    function showModal13() {
        console.log(1);
        $("#myModal13").modal('show');
    }
    function showModal14() {
        $("#myModal14").modal('show');
    }
    function showModal15() {
        $("#myModal15").modal('show');
    }
    function showModal16() {
        $("#myModal16").modal('show');
    }
    function showModal19() {
        $("#myModal19").modal('show');
    }
    function showModal18() {
        $("#myModal18").modal('show');
    }
    function showModal17() {
        $("#myModal17").modal('show');
    }
    function showModal18() {
        $("#myModal18").modal('show');
    }
</script>
</body>
</html>

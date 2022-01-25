@extends('admin::layouts.master')
@section('page_title', 'Đơn vị')
@section('content')
    <section class="content">
    {{--        <div class="box">--}}
    <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="">
                    <a href="{{ route('don-vi-to-chuc.index') }}">
                        <i class="fa fa-user"></i> Danh sách
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('don-vi-to-chuc.create') }}">
                        <i class="fa fa-plus"></i> Thêm đơn vị trực thuộc đơn vị</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="tab_2">
                    @include('admin::to-chuc._form')
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->

    {{--            <div class="box-header with-border">--}}
    {{--                <h3 class="box-title">Quản lý người dùng</h3>--}}
    {{--            </div>--}}
    <!-- /.box-header -->

        {{--        </div>--}}
    </section>
@endsection

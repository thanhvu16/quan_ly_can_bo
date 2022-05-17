@extends('admin::layouts.master')
@section('page_title', 'Quản lý đào tạo')
@section('content')
    <section class="content" style="font-size: 12px">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="{{ empty(Request::get('activity')) || Request::get('activity') == 'activity' ? 'active' : null }}"><a href="#activity" data-toggle="tab">Danh sách lớp dự kiến mở</a></li>
                        <li class="{{  Request::get('activity') == 'activity2' ? 'active' : null }}"><a href="#activity2" data-toggle="tab">Danh sách lớp đang mở</a></li>
                        <li class="{{ Request::get('activity') == 'activity3' ? 'active' : null }}"><a href="#activity3" data-toggle="tab">Danh sách lớp đã kết thúc</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane {{ empty(Request::get('activity')) || Request::get('activity') == 'activity' ? 'active in' : null }}" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="tab-pane" >
                                    @include('quanlydaotao::components.lopDuKien')
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
                                    @include('quanlydaotao::components.dangmo')
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
                                    @include('quanlydaotao::components.ketthuc')
                                </div>
                            </div>
                            <div class="post clearfix">
                                <div class="user-block">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection

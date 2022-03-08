
@extends('admin::layouts.master')
@section('page_title', 'Cán bộ')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-4">

                <!-- Profile Image -->
            @include('canbo::components.thong-tin')
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
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
@endsection
@section('script')
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
    </script>

@endsection
<style>
    fieldset {
        border-color: #F00;
        border-style: solid;
    }

    /*legend {*/
    /*    background-color: gray;*/
    /*    color: white;*/
    /*    padding: 5px 10px;*/
    /*}*/

    /*input {*/
    /*    margin: 5px;*/
    /*}*/
</style>

@extends('admin::layouts.master')
@section('page_title', 'Thêm cán bộ')
@section('content')
    <section class="content">
        <div class="row">
{{--            <div class="col-md-3">--}}

{{--                <!-- Profile Image -->--}}
{{--            @include('themcanbo::components.thong-tin')--}}
{{--                <!-- /.box -->--}}
{{--            </div>--}}
            <!-- /.col -->
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Thêm mới cán bộ</a></li>
{{--                        <li><a href="#activity2" data-toggle="tab">Sơ lược (2)</a></li>--}}
{{--                        <li><a href="#activity3" data-toggle="tab">Sơ lược (3)</a></li>--}}
{{--                        <li><a href="#activity4" data-toggle="tab">Đào tạo - Công tác - Nước ngoài (4)</a></li>--}}
{{--                        <li><a href="#activity5" data-toggle="tab">Lương - Chức vụ - Quy hoạch(5)</a></li>--}}
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="tab-pane" >
                                    @include('themcanbo::components.soluoc1')
                                </div>
                            </div>
                            <div class="post clearfix">
                                <div class="user-block">

                                </div>
                            </div>
                        </div>
                        <div class=" tab-pane" id="activity2">
                            <!-- Post -->
                            <div class="post">
                                <div class="tab-pane" >
{{--                                    @include('canbo::components.soluoc2')--}}
                                </div>
                            </div>
                            <div class="post clearfix">
                                <div class="user-block">

                                </div>
                            </div>
                        </div>
                        <div class=" tab-pane" id="activity3">
                            <!-- Post -->
                            <div class="post">
                                <div class="tab-pane" >
{{--                                    @include('canbo::components.soluoc3a')--}}
                                </div>
                            </div>
                            <div class="post clearfix">
                                <div class="user-block">

                                </div>
                            </div>
                        </div>
                        <div class=" tab-pane" id="activity4">
                            <!-- Post -->
                            <div class="post">
                                <div class="tab-pane" >
{{--                                    @include('canbo::components.soluoc4')--}}
                                </div>
                            </div>
                            <div class="post clearfix">
                                <div class="user-block">

                                </div>
                            </div>
                        </div>
                        <div class=" tab-pane" id="activity5">
                            <!-- Post -->
                            <div class="post">
                                <div class="tab-pane" >
{{--                                    @include('canbo::components.soluoc5')--}}
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
                        @include('themcanbo::components.upload')
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

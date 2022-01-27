
@extends('admin::layouts.master')
@section('page_title', 'Cán bộ')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
            @include('canbo::components.thong-tin')
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Sơ lược (1)</a></li>
                        <li><a href="#activity2" data-toggle="tab">Sơ lược (2)</a></li>
                        <li><a href="#activity3" data-toggle="tab">Sơ lược (3)</a></li>
                        <li><a href="#activity4" data-toggle="tab">Đào tạo - Công tác - Nước ngoài (4)</a></li>
                        <li><a href="#timeline" data-toggle="tab">Đào tạo - Công tác - Nước ngoài (4)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
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
                        <div class=" tab-pane" id="activity2">
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
                        <div class=" tab-pane" id="activity3">
                            <!-- Post -->
                            <div class="post">
                                <div class="tab-pane" >
                                    @include('canbo::components.soluoc3')
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
                                    @include('canbo::components.soluoc4')
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

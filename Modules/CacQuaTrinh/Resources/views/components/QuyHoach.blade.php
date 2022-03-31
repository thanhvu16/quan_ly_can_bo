@extends('admin::layouts.master')
@section('page_title', 'Quy hoạch cán bộ')
@section('content')
    <section class="content" style="font-size: 14px">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <div class="row">
                                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình quy hoạch cán bộ</h4>
                            </div>
                        </div>
                        <div class="col-md-6 text-right mt-4">
                            <a href="/"><i class="fa fa-home"> Trang chủ > </i></a>  <span style="font-size: 12px">{{isset($title) ? $title : '' }}</span>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style=" width: 100%;overflow-x: auto;">
                        <div class="col-md-12" style="background: white">
                            <div class="row">
                                <div class="col-md-12 text-right">

                                    @can(\App\Common\AllPermission::suaCanBo())
                                        <a style="cursor: pointer" onclick="showModal18()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                                    @endcan
                                </div>
                                <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                                    <div class="row">
                                        <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                                            <thead>
                                            <tr>
                                                <td width="5%" class="text-center">STT </td>
                                                <th width="13%" style="vertical-align: middle" class="text-center">Ngày quyết định</th>
                                                <th width=""  style="vertical-align: middle"class="text-center">Chức vụ quy hoạch</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($quaTrinhQuyHoachCanBo2 as $key=>$data1)
                                                <tr >
                                                    <td class="text-center">{{$key+1}} </td>
                                                    <td style="color: red;font-weight: bold" class="text-center">{{formatDMY($data1->ngay_quyet_dinh)}}</td>
                                                    <td>{{$data1->chucVu->ten ?? ''}}</td>
                                                </tr>

                                            @empty
                                                <td colspan="6" class="text-center">Không tìm thấy dữ liệu.</td>
                                            @endforelse
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
        </div>
    </section>
    @include('cacquatrinh::components.modal_qua_trinh_quy_hoach_can_bo')
@endsection


@section('script')
    <script type="text/javascript">
        function showModal18() {
            $("#myModal18").modal('show');
        }
    </script>

@endsection










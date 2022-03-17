@extends('admin::layouts.master')
@section('page_title', 'Quá trình đảm nhiệm các chức vụ Đoàn thể')
@section('content')
    <section class="content" style="font-size: 14px">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <div class="row">
                                <h4 style="color: #0a0a0a;font-weight: bold"><h4 style="color: #0a0a0a;font-weight: bold">Quá trình đảm nhiệm các chức vụ Đoàn thể</h4></h4>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style=" width: 100%;overflow-x: auto;">
                        <div class="col-md-12" style="background: white">
                            <div class="row">
                                <div class="col-md-12 text-right">

                                    @can(\App\Common\AllPermission::suaCanBo())
                                        <a style="cursor: pointer" onclick="showModal7()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                                    @endcan
                                </div>
                                <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                                    <div class="row">
                                        <table class="table table-bordered table-striped dataTable mb-0">
                                            <thead>
                                            <tr>
                                                <td width="5%" class="text-center">STT </td>
                                                <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                                                <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                                                <th width=""  style="vertical-align: middle"class="text-center">Cơ quan</th>
                                                <th width=""  style="vertical-align: middle"class="text-center">Chức vụ</th>
                                                <th width="5%" style="vertical-align: middle" class="text-center">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($quaTrinhQuyHoachCanBo as $key=>$data1)
                                                <tr >
                                                    <td class="text-center">{{$key+1}} </td>
                                                    <td style="color: red;font-weight: bold" class="text-center">{{formatDMY($data1->tu_ngay)}}</td>
                                                    <td style="color: red;font-weight: bold" class="text-center">{{formatDMY($data1->den_ngay)}}</td>
                                                    <td>{{$data1->chuc_vu ?? ''}}</td>
                                                    <td>{{$data1->co_quan ?? ''}}</td>
                                                    <td class="text-center">
                                                        <form method="POST" action="">
                                                            @csrf
                                                            <button class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item" role="button"
                                                                    title="Xóa">
                                                                <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                                            </button>
                                                        </form>

                                                    </td>
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
    @include('cacquatrinh::components.modal_qua_trinh_can_bo')
@endsection


@section('script')
    <script type="text/javascript">
        function showModal7() {
            $("#myModal7").modal('show');
        }
    </script>

@endsection










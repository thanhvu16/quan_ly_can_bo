@extends('admin::layouts.master')
@section('page_title', 'Quan hệ gia đình')
@section('content')
    <section class="content" style="font-size: 14px">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <div class="row">
                                <h4 style="color: #0a0a0a;font-weight: bold">Quan hệ gia đình</h4>
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
                                        <table class="table table-bordered table-striped dataTable mb-0">
                                            <thead>
                                            <tr>
                                                <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                                                <th width="8%" style="vertical-align: middle" class="text-center">Quan hệ</th>
                                                <th width="13%" style="vertical-align: middle" class="text-center">Họ và tên </th>
                                                <th width="13%" style="vertical-align: middle" class="text-center">Năm sinh</th>
                                                <th width=""  style="vertical-align: middle"class="text-center">Nghề nghiệp</th>
                                                <th width=""  style="vertical-align: middle"class="text-center">Nơi làm việc</th>
                                                <th width=""  style="vertical-align: middle"class="text-center">Nơi ở hiện nay</th>
                                                <th width="5%" style="vertical-align: middle" class="text-center">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($quaTrinhGiaDinh as $key=>$data1)
                                                <tr >
                                                    <td class="text-center">{{$key+1}} </td>
                                                    <td class="text-center">{{$data1->quan_he ?? ''   }}</td>
                                                    <td class="text-center">{{$data1->ho_ten ?? ''   }}</td>
                                                    <td class="text-center">{{$data1->nam_sinh ?? ''   }}</td>
                                                    <td class="text-center">{{$data1->nghe_nghiep ?? ''   }}</td>
                                                    <td class="text-center">{{$data1->noi_lam_viec ?? ''   }}</td>
                                                    <td class="text-center">{{$data1->noi_o ?? ''   }}</td>
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
                                                <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
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
    @include('cacquatrinh::components.modal_gia_dinh')
@endsection


@section('script')
    <script type="text/javascript">
        function showModal18() {
            $("#myModal18").modal('show');
        }
    </script>

@endsection










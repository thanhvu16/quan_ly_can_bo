@extends('admin::layouts.master')
@section('page_title', 'Quá trình đào tạo')
@section('content')
    <section class="content" style="font-size: 14px">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <div class="row">
                                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình đào tạo (Đào tạo, Bồi dưỡng nghiệp vụ,Chính trị,Tin học..)</h4>
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
                                        <a style="cursor: pointer" onclick="showModal12()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                                    @endcan
                                </div>
                                <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                                    <div class="row">
                                        <table class="table table-bordered table-striped dataTable mb-0">
                                            <thead>
                                            <tr>
                                                <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                                                <th width="8%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                                                <th width="8%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                                                <th width="10%"  style="vertical-align: middle"class="text-center">Loại đào tạo</th>
                                                <th width="12%"  style="vertical-align: middle"class="text-center">Tên chuyên ngành</th>
                                                <th width="8%" style="vertical-align: middle" class="text-center">Trình độ </th>
                                                <th width="8%" style="vertical-align: middle" class="text-center">Hình thức</th>
                                                <th width="8%" style="vertical-align: middle" class="text-center">Nước đào tạo</th>
                                                <th width="" style="vertical-align: middle" class="text-center">Trường</th>
                                                <th width="" style="vertical-align: middle" class="text-center">Chứng chỉ</th>
                                                <th width="" style="vertical-align: middle" class="text-center">Kinh phí</th>
                                                <th width="5%" style="vertical-align: middle" class="text-center">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($quaTrinhDaoTao as $key=>$data1)
                                                <tr >
                                                    <td class="text-center">{{$key+1}} </td>
                                                    <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->tu_ngay)}}</td>
                                                    <td style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->den_ngay)}}</td>
                                                    <td>{{$data1->loaiDaoTao->ten ?? ''   }}</td>
                                                    <td>{{$data1->ten_chuyen_nganh ?? ''   }}</td>
                                                    <td>{{$data1->trinhDo->ten ?? ''   }}</td>
                                                    <td>{{$data1->hinhThuc->ten ?? ''   }}</td>
                                                    <td>{{$data1->nuoc_dao_tao   }}</td>
                                                    <td>{{$data1->truongHoc->ten ?? ''   }}</td>
                                                    <td>{{$data1->chung_chi ?? ''   }}</td>
                                                    <td>{{$data1->kinh_phi ?? ''   }}</td>
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
    @include('cacquatrinh::components.modal_dao_tao')
@endsection


@section('script')
    <script type="text/javascript">
        function showModal12() {
            $("#myModal12").modal('show');
        }
    </script>

@endsection










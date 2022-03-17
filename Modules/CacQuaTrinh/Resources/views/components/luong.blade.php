@extends('admin::layouts.master')
@section('page_title', 'Quá trình lương')
@section('content')
    <section class="content" style="font-size: 14px">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <div class="row">
                                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình lương</h4>
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
                                        <a style="cursor: pointer" onclick="showModal4()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                                    @endcan
                                </div>
                                <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                                    <div class="row">
                                        <table class="table table-bordered table-striped dataTable mb-0">
                                            <thead>
                                            <tr>
                                                <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                                                <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                                                <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                                                <th width="20%"  style="vertical-align: middle"class="text-center">Ngạch công chức</th>
                                                <th width="10%" style="vertical-align: middle" class="text-center">Bậc </th>
                                                <th width="10%" style="vertical-align: middle" class="text-center">Hệ số</th>
                                                <th width="10%" style="vertical-align: middle" class="text-center">Phụ cấp</th>
                                                <th width="5%" style="vertical-align: middle" class="text-center">%</th>
                                                <th width="" style="vertical-align: middle" class="text-center">Tổng lương</th>
                                                <th width="5%" style="vertical-align: middle" class="text-center">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($quaTrinhLuong as $key=>$data1)
                                                <tr >
                                                    <td class="text-center">{{$key+1}} </td>
                                                    <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->tu_ngay)}}</td>
                                                    <td style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->den_ngay)}}</td>
                                                    <td>{{$data1->ngachCongChuc->ten ?? ''   }}</td>
                                                    <td class="text-center">{{$data1->BacLuong->bac ?? ''   }}</td>
                                                    <td class="text-center">{{$data1->HeSo->he_so_luong ?? ''   }}</td>
                                                    <td>{{$data1->phuCap->ten ?? ''   }}</td>
                                                    <td class="text-center">{{$data1->phan_tram ?? ''   }}</td>
                                                    <td class="text-center">{{number_format($data1->tong_luong) ?? ''   }}đ</td>
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
    @include('cacquatrinh::components.modal_luong')
@endsection


@section('script')
    <script type="text/javascript">
        function showModal4() {
            $("#myModal4").modal('show');
        }
    </script>

@endsection










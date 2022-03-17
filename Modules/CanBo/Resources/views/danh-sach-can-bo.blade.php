
@extends('admin::layouts.master')
@section('page_title', 'Cán bộ')
@section('content')
    <section class="content">
{{--        <div class="content-wrapper" >--}}
            <!-- Content Header (Page header) -->
{{--            <section class="content-header">--}}
{{--                <h1>--}}
{{--                    Invoice--}}
{{--                    <small>#007612</small>--}}
{{--                </h1>--}}
{{--                <ol class="breadcrumb">--}}
{{--                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
{{--                    <li><a href="#">Examples</a></li>--}}
{{--                    <li class="active">Invoice</li>--}}
{{--                </ol>--}}
{{--            </section>--}}

{{--            <div class="pad margin no-print">--}}
{{--                <div class="callout callout-info" style="margin-bottom: 0!important;">--}}
{{--                    <h4><i class="fa fa-info"></i> Note:</h4>--}}
{{--                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Main content -->
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-flag-o"></i> Thông tin đơn vị
                            <small class="pull-right">Ngày: {{date('d/m/Y')}}</small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-2 invoice-col">
                    </div>
                    <div class="col-sm-4 invoice-col te">
                        <address>
                            <strong>Đơn vị chủ quản:</strong> &emsp;
                            VĂN PHÒNG QUẬN ỦY
                        </address>
                        <address>
                            <strong>Mã đơn vị: </strong> &emsp;
                            00001
                        </address>
                        <address>
                            <strong>Chủ tịch:    </strong> &emsp;

                        </address>
                        <address>
                            <strong>Giới thiệu:     </strong> &emsp;

                        </address>
                    </div>

                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">

                        <address>
                            <strong>Đơn vị quản lý:</strong>&emsp;
                            {{$donVi->ten_don_vi ?? ''}}
                        </address>
                        <address>
                            <strong>Tên viết tắt:    </strong> &emsp;
                            {{$donVi->ten_don_vi ?? 'ABC'}}
                        </address>
                        <address>
                            <strong>Phó chủ tịch:    </strong> &emsp;

                        </address>

                    </div>
                    <div class="col-sm-2 invoice-col">
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" width="3%">STT</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center" width="7%">Giới tính</th>
                                <th class="text-center" width="10%">Năm sinh</th>
                                <th class="text-center" width="5%">Dân tộc</th>
                                <th class="text-center" width="10%">Quê quán</th>
                                <th class="text-center" width="13%">Chức vụ hiện tại</th>
                                <th class="text-center" width="15%">Đơn vị</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danhSach as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td style="text-transform: uppercase;font-weight: bold"><a href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa   fa-venus"></i> @endif {{$data->ho_ten}}</a></td>
                                <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
                                <td class="text-center">{{$data->danToc->ten ?? ''}}</td>
                                <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i> {{$data->thanhPho->ten ?? ''}}</td>
                                <td>{{$data->chucVuHienTai->ten ?? ''}}</td>
                                <td>{{$data->donVi->ten_don_vi ?? ''}}</td>
                            </tr>
                            @empty
                                <td class="text-center" colspan="8" style="vertical-align: middle">Không có dữ liệu !</td>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6" style="margin-top: 5px">
                            Tổng số : <b>{{ $danhSach->total() }}</b>
                        </div>
                        <div class="col-md-6 text-right">
                            {!! $danhSach->appends(['ten' => Request::get('ten'),
                               'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->

                <!-- this row will not appear when printing -->
{{--                <div class="row no-print">--}}
{{--                    <div class="col-xs-12">--}}
{{--                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>--}}
{{--                        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment--}}
{{--                        </button>--}}
{{--                        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">--}}
{{--                            <i class="fa fa-download"></i> Generate PDF--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </section>
            <!-- /.content -->
            <div class="clearfix"></div>
{{--        </div>--}}
    </section>

@endsection

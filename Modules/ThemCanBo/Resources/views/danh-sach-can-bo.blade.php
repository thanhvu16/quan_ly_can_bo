
@extends('admin::layouts.master')
@section('page_title', 'Cán bộ')
@section('content')
    <section class="content">

            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa  fa-user"></i> Hồ sơ cán bộ
                            <small class="pull-right">Ngày: {{date('d/m/Y')}}</small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
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
                                <th class="text-center" width="20%">Đơn vị</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danhSach as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td style="text-transform: uppercase;font-weight: bold"><a href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa  fa-wheelchair"></i> @endif {{$data->ho_ten}}</a></td>
                                <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
                                <td class="text-center">{{$data->danToc->ten ?? ''}}</td>
                                <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i> {{$data->thanhPho->ten ?? ''}}</td>
                                <td>{{$data->chucVuHienTai->ten ?? ''}}</td>
                                <td>{{$data->donVi->ten_don_vi ?? ''}}</td>
                            </tr>
                            @empty
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
            </section>
            <!-- /.content -->
            <div class="clearfix"></div>
    </section>

@endsection

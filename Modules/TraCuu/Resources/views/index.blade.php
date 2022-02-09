@extends('admin::layouts.master')
@section('page_title', 'Danh sách cán bộ')
@section('content')
    <section class="content" style="font-size: 14px">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <div class="row">
                                <h3 class="box-title">Tìm kiếm nhanh</h3>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            {{--                            <i>(STT mà đỏ: <span style="color: red">văn bản đang xử lý</span>; STT màu xanh: <span style="color: blue">Văn bản chưa được phân</span>; STT màu đen: <span style="color: black">Văn bản đã hoàn thành</span>)</i>--}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="col-md-12 mt-1 ">
                        <div class="row">
                            <div class="col-md-6">
                                <a class=" btn btn-primary" data-toggle="collapse"
                                   href="#collapseExample"
                                   aria-expanded="false" aria-controls="collapseExample"> <i class="fa  fa-search"></i> <span
                                        style="font-size: 14px"></span>
                                </a>
                            </div>
                            <div class="col-md-6 text-right">
                                    <form method="GET" action="{{ route('tra-cuu.index') }}" class="form-export">
                                        <input type="hidden" name="type"  value="">
                                        <input type="hidden" name="ten_cb"  value="{{Request::get('ten_cb') }}">
                                        <input type="hidden" name="don_vi"  value="{{Request::get('don_vi') }}">
                                        <input type="hidden" name="chuc_vu_chinh" value="{{Request::get('chuc_vu_chinh') }}">
                                        <input type="hidden" name="page" value="{{Request::get('page') }}">

                                        <button type="button" data-type="excel"
                                                class="btn btn-success waves-effect waves-light btn-sm btn-export-data"><i
                                                class="fa fa-file-excel-o"></i> Xuất Excel
                                        </button>
                                    </form>
                            </div>


                            {{--                            @can('in sổ văn bản đơn vị')--}}
                            {{--                           --}}
                            {{--                            <div class="col-md-6 text-right">--}}
                            {{--                                <a role="button" href="{{route('in-so-tra-cuu.index')}}"  class="btn btn-success ">--}}
                            {{--                                    <span style="color: white;font-size: 14px"><i class="fa  fa-print"></i> In sổ</span></a>--}}
                            {{--                            </div>--}}
                            {{--                                @endcan--}}
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="row">

                            <div class="col-md-12 collapse in }} " id="collapseExample">
                                <form action="{{route('tra-cuu.index')}}" id="tim_kiem" method="get" >
                                    <div class="row">
                                        <div class="form-group col-md-3" >
                                            <label for="loai_van_ban_id" class="col-form-label">Tên cán bộ</label>
                                            <input type="text" name="ten_cb" value="{{Request::get('ten_cb')}}" class="form-control" placeholder="Nhập tên cán bộ..">
                                        </div>

                                        <div class="form-group col-md-3" >
                                            <label for="don_vi" class="col-form-label">Đơn vị</label>
                                            <select class="form-control  select2 "
                                                    name="don_vi" id="don_vi">
                                            <option value="">--Lựa chọn--</option>
                                            @foreach($donVi as $dsdv)
                                                <option value="{{$dsdv->id}}"  {{Request::get('don_vi') == $dsdv->id ? 'selected' : ''}}>{{$dsdv->ten_don_vi}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Chức vụ chính quyền</label>
                                            <select class="form-control  select2 "
                                                    name="chuc_vu_chinh" id="chuc_vu_chinh">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($chucVuHienTai as $hientai)
                                                    <option value="{{$hientai->id}}"  {{Request::get('chuc_vu_chinh') == $hientai->id ? 'selected' : ''}}>{{$hientai->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3 mt-4">
                                            <button class="btn btn-primary" type="submit"> <i class="fa fa-search"></i> Tìm kiếm</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body" style=" width: 100%;overflow-x: auto;">
                        Tổng số cán bộ: <b style="font-size: 16px">{{ $danhSach->total() }}</b>
                        <table class="table table-bordered table-striped dataTable mb-0">
                            <thead>
                            <tr>
                                <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                                <th width="" style="vertical-align: middle" class="text-center">Họ tên</th>
                                <th width="5%" style="vertical-align: middle" class="text-center">Giới tính</th>
                                <th width="7%"  style="vertical-align: middle"class="text-center">Năm sinh</th>
                                <th width="5%" style="vertical-align: middle" class="text-center">Dân tộc</th>
                                <th width="8%" style="vertical-align: middle" class="text-center">Quê quán</th>
                                <th width="15%" style="vertical-align: middle" class="text-center">Chức vụ</th>
                                <th width="13%" style="vertical-align: middle" class="text-center">Đơn vị</th>
                                <th width="8%" style="vertical-align: middle" class="text-center">Mã thẻ Đảng</th>
                                <th width="10%" style="vertical-align: middle" class="text-center">Ngày vào Đảng CT</th>
{{--                                <th width="13%" style="vertical-align: middle" class="text-center">Chức vụ Đảng</th>--}}
{{--                                <th width="8%" style="vertical-align: middle" class="text-center">Đơn vị đảng</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($danhSach as $key=>$data)
                                <tr >
                                    <td class="text-center">{{$key+1}} </td>
                                    <td style="text-transform: uppercase;font-weight: bold" ><a href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown;" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa  fa-wheelchair"></i> @endif {{$data->ho_ten}}</a></td>
                                    <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                    <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
                                    <td class="text-center">Kinh</td>
                                    <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i>  {{$data->thanhPho->ten ?? ''}}</td>
                                    <td>{{$data->chucVuHienTai->ten ?? ''}}</td>
                                    <td>{{$data->donVi->ten_don_vi ?? ''}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->so_the_dang}}</td>
                                    <td class="text-center" style="vertical-align: middle">@if($data->ngay_vao_dang_chinh_thuc){{date("d/m/Y", strtotime($data->ngay_vao_dang_chinh_thuc))}}@endif</td>

                                </tr>



                            @empty
                                <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 5px">

                            </div>
                            <div class="col-md-6 text-right">
                                {!! $danhSach->appends(['ten_cb' => Request::get('ten_cb'),'don_vi' => Request::get('don_vi'),'chuc_vu_chinh' => Request::get('chuc_vu_chinh')])->render() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script type="text/javascript">
        $('.btn-export-data').on('click', function () {
            console.log(123);
            let type = $(this).data('type');
            $('input[name="type"]').val(type);
            $('.form-export').submit();
            hideLoading();
        });


    </script>

@endsection














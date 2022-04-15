@extends('admin::layouts.master')
@section('page_title', 'Lập danh sách cấp thẻ')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lập danh sách đợt cấp huy hiệu đảng</h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="row">
                            <form action="{{route('cap-huy-hieu-dang.index')}}" method="get">
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Mã đơn vị</label>
                                    <input type="text" class="form-control" value="{{auth::user()->donVi->ma_hanh_chinh ?? ''}}" placeholder="Ghi chú">
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail4">Đợt cấp huy hiệu</label>
                                        <select class="form-control select2" name="dot_cap" onchange="this.form.submit()">
                                            <option value="">--Lựa chọn--</option>
                                            @foreach($dotCapThe as $dsCapThe)
                                                <option value="{{$dsCapThe->id}}" {{Request::get('dot_cap') == $dsCapThe->id ? 'selected' : ''}} >{{date("d/m/Y", strtotime($dsCapThe->dot_cap_the))}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-3" style="max-height:650px;  overflow:auto">
                                <form action="{{route('cap-huy-hieu-dang.store')}}" id="can-bo" method="POST">
                                    @csrf
                                    <input type="hidden" name="dot_cap" value="{{Request::get('dot_cap')}}">
                                    @if(Request::get('dot_cap') != null)
                                    <button type="submit"
                                            class="btn btn-sm mt-1 btn-submit btn-primary waves-effect waves-light  btn-duyet-all   btn-sm mb-2"
                                            data-original-title=""
                                            title=""><i class="fa fa-check"></i> Duyệt
                                    </button>
                                    @endif
                                </form>

                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th width="5%" class="text-center">Chọn</th>
                                        <th width="" class="text-center">Danh sách đảng viên</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($danhSach as $key=>$data)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">
                                                <input type="checkbox" value="{{ $data->id }}" form="can-bo" name="can_bo[{{ $data->id }}]" id="can-bo-{{ $data->id .'.3' }}">
                                            </td>
                                            <td class="text-left" style="vertical-align: middle">
                                                <label for="can-bo-{{ $data->id .'.3' }}">{{$data->ho_ten}}</label>
                                                </td>


                                        </tr>
                                    @empty
                                        <td class="text-center" colspan="4" style="vertical-align: middle">Không có dữ liệu !
                                        </td>
                                    @endforelse

                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
{{--                                        <div class="col-md-6" style="margin-top: 5px">--}}
{{--                                            Tổng số : <b>{{ $danhSach->total() }}</b>--}}
{{--                                        </div>--}}
                                        <div class="col-md-12 text-right">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9" style="max-height:650px;  overflow:auto">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" colspan="8" style="vertical-align: middle" width="3%">Danh sách cán bộ chờ duyệt cấp huy hiệu đảng</th>

                                    </tr>
                                    <tr>
                                        <th class="text-center" style="vertical-align: middle" width="3%">STT</th>
                                        <th class="text-center" style="vertical-align: middle">Họ tên</th>
                                        <th class="text-center" style="vertical-align: middle" width="7%">Giới tính</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Năm sinh</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Dân tộc</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Quê quán</th>
                                        <th class="text-center" style="vertical-align: middle" width="19%">Chức vụ hiện tại</th>
                                        <th class="text-center" style="vertical-align: middle" width="17%">Đơn vị</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($danhSachTheoDot as $key=>$data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td style="text-transform: uppercase;font-weight: bold"><a href="{{route('canBoDetail',$data->canBo->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa   fa-venus"></i> @endif {{$data->canBo->ho_ten}}</a></td>
                                            <td class="text-center">{{$data->canBo->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td class="text-center">{{date("d/m/Y", strtotime($data->canBo->ngay_sinh))}}</td>
                                            <td class="text-center">{{$data->canBo->danToc->ten ?? ''}}</td>
                                            <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i> {{$data->canBo->thanhPho->ten ?? ''}}</td>
                                            <td>{{$data->canBo->chucVuHienTai->ten ?? ''}}</td>
                                            <td>{{$data->canBo->donVi->ten_don_vi ?? ''}}</td>
                                        </tr>
                                    @empty
                                        <td class="text-center" colspan="8" style="vertical-align: middle">Không có dữ liệu !</td>
                                    @endforelse

                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{--                                        <div class="col-md-6" style="margin-top: 5px">--}}
                                        {{--                                            Tổng số : <b>{{ $danhSach->total() }}</b>--}}
                                        {{--                                        </div>--}}
                                        <div class="col-md-12 text-right">
                                            @if(count($danhSachTheoDot) > 0)
                                            {!! $danhSachTheoDot->appends(['ten' => Request::get('ten'),
                                               'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
                                            @endif
                                        </div>
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

@endsection

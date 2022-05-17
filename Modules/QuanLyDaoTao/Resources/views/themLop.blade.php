@extends('admin::layouts.master')
@section('page_title', 'Lớp đào tạo')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách các lớp đào tạo</h3>
                    </div>
                    <div class="col-md-3 form-group mt-4">
                        <button type="button" class="btn btn-sm btn-info waves-effect waves-light mb-1"
                                data-toggle="collapse"
                                href="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                            {{isset($first) ? 'CẬP NHẬT LỚP ĐÀO TẠO' : 'THÊM LỚP ĐÀO TẠO'}}</button>
                    </div>

                    <!-- /.box-header -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="collapse {{isset($first) ? 'in' : '' }}" id="collapseExample">
                                <div class="row">
                                    <form role="form" action="@if($first){{route('quan-ly-lop-dao-tao.update',$first->id)}}@else{{route('quan-ly-lop-dao-tao.store')}}@endif"  method="post" enctype="multipart/form-data"
                                          id="myform">
                                        @csrf
                                        @method('PUT')
                                        <div class="box-body">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Tên lớp đào tạo</label>
                                                    <input type="text" class="form-control" value="{{isset($first) ? $first->ten : ''}}" name="ten" id="exampleInputEmail2"
                                                           placeholder="Tên lớp.." >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Số lượng</label>
                                                    <input type="number" class="form-control" value="{{isset($first) ? $first->so_luong : ''}}" name="so_luong" id="exampleInputEmail2"
                                                           placeholder="Số lượng" >
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail4">Ngày khai giảng</label>
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control  datepicker"
                                                               name="ngay_khai_giang" id="ngay_khai_giang" autocomplete="off" value="{{isset($first) ? date("d/m/Y", strtotime($first->ngay_khai_giang)) : ''}}"
                                                               placeholder="dd/mm/yyyy" >
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail4">Ngày bế giảng</label>
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control  datepicker"
                                                               name="ngay_be_giang" id="ngay_be_giang" autocomplete="off" value="{{isset($first) ? date("d/m/Y", strtotime($first->ngay_be_giang)) : ''}}"
                                                               placeholder="dd/mm/yyyy" >
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail4">Trạng thái</label>
                                                    <select class="form-control select2" name="trang_thai" >
                                                        <option  value="">--Lựa chọn--</option>
                                                        <option value="1" {{isset($first) && $first->trang_thai == 1 ? 'selected' : ''}}>--Dự kiến mở--</option>
                                                        <option value="2" {{isset($first) && $first->trang_thai == 2 ? 'selected' : ''}}>--Đang mở--</option>
                                                        <option value="3" {{isset($first) && $first->trang_thai == 3 ? 'selected' : ''}}>--Đã kết thúc--</option>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Nội dung</label>
                                                    <input type="text" class="form-control" value="{{isset($first) ? $first->noi_dung_dt : ''}}" name="noi_dung_dt" id="exampleInputEmail2"
                                                           placeholder="Nội dung.." >
                                                </div>
                                            </div>


                                            <div class="col-md-3 text-left" style="margin-top: 20px">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{isset($first) ? 'Cập nhật' : 'Thêm mới'}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                        <form action="{{route('quan-ly-lop-dao-tao.index')}}" id="tim_kiem" method="get">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="loai_van_ban_id" class="col-form-label">Tên lớp đào tạo</label>
                                    <input type="text" name="ten" value="{{Request::get('ten')}}"
                                           class="form-control" placeholder="Nhập tên lớp..">
                                </div>
                                <div class="form-group col-md-3 mt-4">
                                    <button class="btn btn-primary" type="submit" name="search" value="1"><i class="fa fa-search"></i>
                                        Tìm kiếm
                                    </button>

                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                            <thead>
                            <tr>
                                <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                                <th width="" style="vertical-align: middle" class="text-center">Tên lớp</th>
                                <th width="15%" style="vertical-align: middle" class="text-center">Đơn vị mở lớp</th>
                                <th width="7%" style="vertical-align: middle" class="text-center">Số lượng</th>
                                <th width="8%" style="vertical-align: middle" class="text-center">Ngày khai giảng</th>
                                <th width="8%" style="vertical-align: middle" class="text-center">Ngày bế giảng</th>
                                <th width="15%" style="vertical-align: middle" class="text-center">Nội dung đào tạo</th>
                                <th width="10%" style="vertical-align: middle" class="text-center">Trạng thái</th>
                                <th width="5%" style="vertical-align: middle" class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($danh_sach as $key=>$data)
                                <tr>
                                    <td class="text-center">{{$key+1}} </td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ten}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->donVi->ten_don_vi ?? ''}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->so_luong}}</td>
                                    <td class="text-center" style="vertical-align: middle">@if($data->ngay_khai_giang){{date("d/m/Y", strtotime($data->ngay_khai_giang))}}@endif</td>
                                    <td class="text-center" style="vertical-align: middle">@if($data->ngay_be_giang){{date("d/m/Y", strtotime($data->ngay_be_giang))}}@endif</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->noi_dung_dt}}</td>
                                    <td class="text-center" style="vertical-align: middle">
                                        @if($data->trang_thai == 1)
                                            <span class="label label-info">Dự kiến mở</span>
                                        @elseif($data->trang_thai == 2)
                                            <span class="label label-success">Đang mở</span>
                                        @else
                                            <span class="label label-danger">Đã kết thúc</span>
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle">
                                        <a href="{{route('quan-ly-lop-dao-tao.index','id='.$data->id)}}" title="Sửa"><i class="fa fa-edit "></i></a>
                                    </td>

                                </tr>



                            @empty
                                <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số : <b>{{ $danh_sach->total() }}</b>
                                </div>
                                <div class="col-md-6 text-right">
                                    {!! $danh_sach->appends(['ten' => Request::get('ten'),
                                       'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
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

@extends('admin::layouts.master')
@section('page_title', 'Đợt cấp thẻ')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách đợt cấp thẻ đảng</h3>
                    </div>
                    <div class="col-md-3 form-group mt-4">
                        <button type="button" class="btn btn-sm btn-info waves-effect waves-light mb-1"
                                data-toggle="collapse"
                                href="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                            {{isset($first) ? 'CẬP NHẬT ĐỢT CẤP THẺ' : 'THÊM ĐỢT CẤP THẺ'}}</button>
                    </div>

                    <!-- /.box-header -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="collapse {{isset($first) ? 'in' : '' }}" id="collapseExample">
                                <div class="row">
                                    <form role="form" action="@if($first){{route('capNhatCT',$first->id)}}@else{{route('themMoiDotCap')}}@endif"  method="post" enctype="multipart/form-data"
                                          id="myform">
                                        @csrf
                                        <div class="box-body">
                                            <div class="form-group col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail4">Đợt cấp thẻ</label>
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control  datepicker"
                                                               name="dot_cap_the" id="dot_cap_the" value="{{isset($first) ? date("d/m/Y", strtotime($first->dot_cap_the)) : ''}}"
                                                               placeholder="dd/mm/yyyy" >
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Ghi chú</label>
                                                    <input type="text" class="form-control" value="{{isset($first) ? $first->ghi_chu : ''}}" name="ghi_chu" id="exampleInputEmail2"
                                                           placeholder="Ghi chú" >
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
                        <div class="row">
                            <form action="{{route('DSDotCapThe')}}" method="get">

                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail4">Đợt cấp thẻ</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control  datepicker"
                                                   name="dot_cap_the" id="dot_cap_the" value="{{Request::get('dot_cap_the')}}"
                                                   placeholder="dd/mm/yyyy" >
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo ghi chú</label>
                                    <input type="text" class="form-control" value="{{Request::get('ghi_chu')}}"
                                           name="ghi_chu"
                                           placeholder="Ghi chú">
                                </div>
                                <div class="col-md-3" style="margin-top: 20px">
                                    <button type="submit" name="search" class="btn btn-primary">Tìm Kiếm</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="5%" class="text-center">STT</th>
                                <th width="10%" class="text-center">Đợt cấp thẻ</th>
                                <th width="" class="text-center">Ghi chú</th>
                                <th width="10%" class="text-center">Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danh_sach as $key=>$data)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>
                                    <td class="text-center" style="vertical-align: middle"><a href="{{route('cap-the-dang.index','dot_cap='.$data->id)}}">{{date("d/m/Y", strtotime($data->dot_cap_the))}}</a></td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ghi_chu}}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{route('xoaDotCap',$data->id)}}">
                                            @csrf
                                            <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm"
                                               href="{{route('DSDotCapThe','id='.$data->id)}}" role="button" title="Sửa">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item" role="button"
                                                    title="Xóa">
                                                <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                            </button>
                                        </form>

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

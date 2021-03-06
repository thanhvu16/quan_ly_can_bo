@extends('admin::layouts.master')
@section('page_title', 'cấp bậc hệ số lương')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách cấp bậc hệ số lương</h3>
                    </div>
                    <div class="col-md-3 form-group mt-4">
                        <button type="button" class="btn btn-sm btn-info waves-effect waves-light mb-1"
                                data-toggle="collapse"
                                href="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                            THÊM CẤP BẬC HỆ SỐ LƯƠNG</button>
                    </div>

                    <!-- /.box-header -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="collapse " id="collapseExample">
                                <div class="row">
                                    <form role="form" action="{{route('bac-he-so-luong.store')}}" method="post" enctype="multipart/form-data"
                                          id="myform">
                                        @csrf
                                        <div class="box-body">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên cấp bậc hệ số lương</label>
                                                    <input type="text" class="form-control" name="ten" id="exampleInputEmail1"
                                                           placeholder="Tên cấp bậc hệ số lương" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Bậc</label>
                                                    <input type="number" class="form-control" name="bac" id="exampleInputEmail11"
                                                           placeholder="Bậc.." >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Hệ số lương</label>
                                                    <input type="text" class="form-control" name="he_so_luong" id="exampleInputEmail2"
                                                           placeholder="hệ số.." >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Mô tả</label>
                                                    <input type="text" class="form-control" name="mo_ta" id="exampleInputEmail2"
                                                           placeholder="Tên viết tắt" >
                                                </div>
                                            </div>


                                            <div class="col-md-3 text-left" style="margin-top: 20px">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
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
                            <form action="{{route('bac-he-so-luong.index')}}" method="get">

                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo tên cấp bậc hệ số lương</label>
                                    <input type="text" class="form-control" value="{{Request::get('ten')}}"
                                           name="ten"
                                           placeholder="Tên..">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo mô tả</label>
                                        <input type="text" class="form-control" value="{{Request::get('mo_ta')}}"
                                           name="mo_ta"
                                           placeholder="Mô tả">
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
                                <th width="" class="text-center">Tên cấp bậc hệ số lương</th>
                                <th width="20%" class="text-center">Hệ số lương</th>
                                <th width="20%" class="text-center">Bậc</th>
                                <th width="20%" class="text-center">Mô tả</th>
                                <th width="10%" class="text-center">Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danh_sach as $key=>$data)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ten}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->he_so_luong}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->bac}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->mo_ta}}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{route('xoaheso',$data->id)}}">
                                            @csrf
                                            <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm"
                                               href="{{route('bac-he-so-luong.edit',$data->id)}}" role="button" title="Sửa">
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
                                <td class="text-center" colspan="5" style="vertical-align: middle">Không có dữ liệu !
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

@extends('admin::layouts.master')
@section('page_title', 'cấp bậc hệ số lương')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cập nhật cấp bậc hệ số lương </h3>
                    </div>
                    <form action="{{route('bac-he-so-luong.update',$data->id)}}" method="post" enctype="multipart/form-data"
                          id="myform">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên cấp bậc hệ số lương</label>
                                    <input type="text" class="form-control" value="{{$data->ten}}"
                                           name="ten" id="exampleInputEmail1"
                                           placeholder="Tên.." required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Hệ số lương</label>
                                    <input type="text" class="form-control" name="he_so_luong" value="{{$data->he_so_luong}}" id="exampleInputEmail2"
                                           placeholder="hệ số.." >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Mô tả</label>
                                    <input type="text" class="form-control" value="{{$data->mo_ta}}"
                                           name="mo_ta" id="exampleInputEmail2"
                                           placeholder="Mô tả" >
                                </div>
                            </div>


                            <div class="col-md-3 text-left" style="margin-top: 20px">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

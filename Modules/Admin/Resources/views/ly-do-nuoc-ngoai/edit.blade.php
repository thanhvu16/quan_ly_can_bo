@extends('admin::layouts.master')
@section('page_title', 'lý do đi nước ngoài')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cập nhật lý do đi nước ngoài</h3>
                    </div>
                    <form action="{{route('ly-do-di-nuoc-ngoai.update',$data->id)}}" method="post" enctype="multipart/form-data"
                          id="myform">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên lý do đi nước ngoài</label>
                                    <input type="text" class="form-control" value="{{$data->ten}}"
                                           name="ten" id="exampleInputEmail1"
                                           placeholder="Tên.." required>
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
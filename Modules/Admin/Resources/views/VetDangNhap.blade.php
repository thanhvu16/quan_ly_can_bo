@extends('admin::layouts.master')
@section('page_title', 'Lưu vết đăng nhập')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Vết đăng nhập</h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="row">
                            <form action="{{route('vetDangNhap')}}" method="get">

                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo họ tên</label>
                                    <input type="text" class="form-control" value="{{Request::get('ten')}}" name="ten" placeholder="Tên..">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo tài khoản</label>
                                    <input type="text" class="form-control" value="{{Request::get('tai_khoan')}}" name="tai_khoan" placeholder="Tài khoản..">
                                </div>
                                <div class="col-md-3 form-group">
                                    <div class="form-group">
                                        <label for="ngay">Tìm theo ngày</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control  datepicker"
                                                   name="ngay" id="ngay" value="{{Request::get('ngay')}}"
                                                   placeholder="dd/mm/yyyy" required>
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"></i>
                                            </div>
                                        </div>
                                    </div>
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
                                <th width="" class="text-center">Tài khoản</th>
                                <th width="" class="text-center">Họ tên</th>
                                <th width="15%" class="text-center">Thời gian đăng nhập</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($duLieu as $key=>$data)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->tai_khoan}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ho_ten}}</td>
                                    <td class="text-center"> {{date_format($data->created_at, 'd-m-Y H:i:s') ?? ''}}</td>

                                </tr>
                            @empty
                                <td class="text-center" colspan="5" style="vertical-align: middle">Không có dữ liệu !</td>
                            @endforelse

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số : <b>{{ $duLieu->total() }}</b>
                                </div>
                                <div class="col-md-6 text-right">
                                    {!! $duLieu->appends(['ten' => Request::get('ten'),'tai_khoan' => Request::get('tai_khoan'),'ngay' => Request::get('ngay'),'search' =>Request::get('search') ])->render() !!}
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

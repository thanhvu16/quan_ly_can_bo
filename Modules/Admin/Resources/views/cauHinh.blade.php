@extends('admin::layouts.master')
@section('page_title', 'Cấu hình')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cấu hình</h3>
                    </div>
                    <form role="form" action="{{route('postCauHinh',$cauHinh->id)}}" method="post"
                          enctype="multipart/form-data"
                          id="myform">
                        @csrf
                        <div class="box-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tên đơn vị vận hành hệ thống</label>
                                    <input type="text" class="form-control " value="{{$cauHinh->ten_don_vi}}" name="ten_don_vi"
                                           id="exampleInputEmail3"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Địa chỉ</label>
                                    <input type="text" class="form-control " value="{{$cauHinh->dia_chi}}" name="dia_chi"
                                           id="exampleInputEmail3"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Điện thoại</label>
                                    <input type="text" class="form-control " value="{{$cauHinh->dien_thoai}}" name="dien_thoai"
                                           id="exampleInputEmail3"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Fax</label>
                                    <input type="text" class="form-control " value="{{$cauHinh->Fax}}" name="Fax"
                                           id="exampleInputEmail3"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Thư điện tử</label>
                                    <input type="text" class="form-control " value="{{$cauHinh->thu_dien_tu}}" name="thu_dien_tu"
                                           id="exampleInputEmail3"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Mật khẩu thư điện tử</label>
                                    <input type="password" class="form-control " value="{{$cauHinh->mat_khau_dien_tu}}" name="mat_khau_dien_tu"
                                           id="exampleInputEmail3"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Host smtp mail</label>
                                    <input type="text" class="form-control " value="{{$cauHinh->host}}" name="host"
                                           id="exampleInputEmail3"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Port smtp mail</label>
                                    <input type="text" class="form-control " value="{{$cauHinh->port_smtp}}" name="port_smtp"
                                           id="exampleInputEmail3"
                                           placeholder="">
                                </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Bảo mật theo ssl/tls</label>
                                        <input type="text" class="form-control " value="{{$cauHinh->bao_mat}}" name="bao_mat"
                                               id="exampleInputEmail3"
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Port POP3 mail</label>
                                        <input type="text" class="form-control " value="{{$cauHinh->port_pop3}}" name="port_pop3"
                                               id="exampleInputEmail3"
                                               placeholder="">
                                    </div>
                                </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label" for="gioi_tinh">Lịch thứ 7</label>
                                <br>
                                <label>
                                    <input type="radio" name="licht7" class="flat-red" value="1"
                                           {{ isset($cauHinh) && $cauHinh->licht7 == 1 ? 'checked' : '' }}
                                           checked> Làm cả ngày
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" name="licht7" class="flat-red"
                                           value="2"
                                        {{ isset($cauHinh) && $cauHinh->licht7 == 2 ? 'checked' : '' }}
                                    > Làm nửa ngày
                                </label>
                                <label>
                                    <input type="radio" name="licht7" class="flat-red"
                                           value="3"
                                        {{ isset($cauHinh) && $cauHinh->licht7 == 3 ? 'checked' : '' }}
                                    > Nghỉ
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label" for="lichcn">Lịch chủ nhật</label>
                                <br>
                                <label>
                                    <input type="radio" name="lichcn" class="flat-red" value="1"
                                           {{ isset($cauHinh) && $cauHinh->lichcn == 1 ? 'checked' : '' }}
                                           checked> Làm cả ngày
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" name="lichcn" class="flat-red"
                                           value="2"
                                        {{ isset($cauHinh) && $cauHinh->lichcn == 2 ? 'checked' : '' }}
                                    > Làm nửa ngày
                                </label>
                                <label>
                                    <input type="radio" name="lichcn" class="flat-red"
                                           value="3"
                                        {{ isset($cauHinh) && $cauHinh->lichcn == 3 ? 'checked' : '' }}
                                    > Nghỉ
                                </label>
                            </div>




                            <div class="col-md-12 mt-4">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square-o mr-1"></i> Cập nhật</button>
                                </div>
                            </div>
                            <div id="moda-search" class="modal fade" role="dialog">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


@extends('admin::layouts.master')
@section('page_title', 'Đơn Vị')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cập nhật đơn vị</h3>
                    </div>
                    <form action="{{route('don-vi-to-chuc.update',$donvi->id)}}" method="post" enctype="multipart/form-data"
                          id="myform">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên đơn vị</label>
                                    <input type="text" class="form-control" value="{{$donvi->ten_don_vi}}"
                                           name="ten_don_vi" id="exampleInputEmail1"
                                           placeholder="Tên đơn vị" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Nhóm đơn vị</label>
                                    <select class="form-control select2" name="nhom_don_vi">
                                        @foreach($nhom_don_vi as $data)
                                            <option value="{{$data->id}}"  {{$donvi && $data->id == $donvi->nhom_don_vi ? 'selected' : ''}}>{{$data->ten_nhom_don_vi}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tên viết tắt</label>
                                    <input type="text" class="form-control" value="{{$donvi->ten_viet_tat}}"
                                           name="ten_viet_tat" id="exampleInputEmail3"
                                           placeholder="Tên viết tắt" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Mã hành chính</label>
                                    <input type="text" class="form-control" value="{{$donvi->ma_hanh_chinh}}"
                                           name="ma_hanh_chinh" id="exampleInputEmail3"
                                           placeholder="Mã hành chính" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail4">Địa chỉ</label>
                                    <input type="text" value="{{$donvi->dia_chi}}" class="form-control" name="dia_chi"
                                           id="exampleInputEmail4"
                                           placeholder="Địa chỉ" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail4">Điện thoại</label>
                                    <input type="text" value="{{$donvi->so_dien_thoai}}" class="form-control"
                                           name="dien_thoai" id="exampleInputEmail4"
                                           placeholder="Điện thoại" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail4">Email</label>
                                    <input type="text" value="{{$donvi->email}}" class="form-control" name="email"
                                           id="exampleInputEmail4"
                                           placeholder="Email" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail4">Điều hành</label>
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="dieu_hanh" id="optionsRadios1"
                                                       {{isset($donvi) && $donvi->dieu_hanh ==1 ? 'checked':''}} value="1"
                                                       checked="">
                                                Có
                                            </label> &emsp;
                                            <label>
                                                <input type="radio" name="dieu_hanh"
                                                       {{isset($donvi) && $donvi->dieu_hanh == 0 ? 'checked':''}} id="optionsRadios2"
                                                       value="0">
                                                Không
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-3">
                                <label>
                                    <input type="checkbox" name="cap_xa" value="1" {{ isset($donvi) && $donvi->cap_xa == 1 ? "checked" : null }}>
                                   Đơn vị cấp 2
                                </label> &emsp;
                            </div>

{{--                            <div class="col-md-3">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label >Có phòng ban trong đơn vị</label>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="radio">&emsp;--}}
{{--                                            <label>--}}
{{--                                                <input type="radio" name="check_parent" id="optionsRadios3"--}}
{{--                                                       value="0" {{ $donvi->parent_id == 0 ? 'checked' : null }} class="check_parent">--}}
{{--                                                Không--}}
{{--                                            </label>--}}
{{--                                            <label>--}}
{{--                                                <input type="radio" name="check_parent" id="optionsRadios4" class="check_parent" value="1" {{ $donvi->parent_id != 0 ? 'checked' : null }} >--}}
{{--                                                Có--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-3 parent-id {{ $donvi->parent_id != 0 ? 'show' : 'hide' }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chọn đơn vị</label>
                                    <select class="form-control select2" name="parent_id">
                                        <option value="">Chọn đơn vị</option>
                                        @foreach($donViCapXa as $data)
                                            <option value="{{ $data->id }}" {{ $donvi->parent_id == $data->id ? 'selected' : null }} >{{ $data->ten_don_vi }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
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
@section('script')
    <script type="text/javascript">
        $('.check_parent').on('click', function () {
            let status = $(this).val();
            if (status == 1) {
                $('.parent-id').removeClass('hide');
            } else {
                $('.parent-id').addClass('hide');
            }
        });
    </script>
@endsection

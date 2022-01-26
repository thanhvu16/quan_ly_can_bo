
@extends('admin::layouts.master')
@section('page_title', 'Cán bộ')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <a onclick="showModal()" style="cursor: pointer">
                            <span style="color: white;font-size: 14px"><i class="fa fa-folder-open-o"></i>
                                <img class="profile-user-img img-responsive img-circle" src="{{asset('logobo.jpg')}}" alt="User profile picture">
                            </span></a>

                        <h3 class="profile-username text-center">{{$canBo->ho_ten}}</h3>

                        <p class="text-muted text-center">Phó chủ tịch</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Đơn vị chủ quản</b> <a class="pull-right">QUẬN ỦY NAM TỪ LIÊM</a>
                            </li>
                            <li class="list-group-item">
                                <b>Đơn vị quản lý</b> <a class="pull-right">BAN TỔ CHỨC QUẬN ỦY</a>
                            </li>
                            <li class="list-group-item">
                                <b>Số thẻ Đảng</b> <a class="pull-right">29 123456</a>
                            </li>
                            <li class="list-group-item">
                                <b>Hình thức tuyển</b>
                                <a class="pull-right">
                                    <select name="" id="" style="text-align: center">
                                        <option value="">Thi tuyển</option>
                                        <option value="">Hợp đồng 3 năm</option>
                                    </select>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Trạng thái</b>
                                <a class="pull-right">
                                    <select name="" id="" style="text-align: center">
                                        <option value="">Hiện đang có mặt</option>
                                        <option value="">Điều động đến</option>
                                    </select>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Trung ương quản lý	</b> <a class="pull-right"><input type="checkbox"></a>
                            </li>
                            <li class="list-group-item">
                                <b>Làm công tác quản lý</b> <a class="pull-right"><input type="checkbox"></a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b><i class="fa fa-check-square-o"></i> Cập nhật</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin thêm</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Trình độ:</strong> &emsp;Đại học
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i>Quê quán:</strong>&emsp;Hà Nội
                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Kỹ năng</strong>

                        <p>
                            ( đang cập nhật..)
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Khen thưởng</strong><br>

                        <i>( Chưa có khen thưởng nào được cập nhật ).</i>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Sơ lược (1)</a></li>
                        <li><a href="#activity2" data-toggle="tab">Sơ lược (2)</a></li>
                        <li><a href="#timeline" data-toggle="tab">Sơ lược (3)</a></li>
                        <li><a href="#so-luoc-1" data-toggle="tab">Đào tạo - Công tác - Nước ngoài (4)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="tab-pane" >
                                    <form class="" >
                                        <div class="col-md-12" style="background: white">
                                            <div class="row">
                                                <div class="col-md-3 " >
                                                    <div class="form-group" >
                                                        <label for="exampleInputEmail1">Họ tên</label>
                                                        <input type="text" class="form-control" name="ten" id="exampleInputEmail1"
                                                               placeholder="Nhập tên " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Tên gọi khác</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Nhập tên " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Giới tính</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Nam</option>
                                                            <option value="1">Nữ</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail4">Ngày sinh <span
                                                                style="color: red">*</span></label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control  datepicker"
                                                                   name="ngay_ban_hanh" id="ngay-ban-hanh-vb"
                                                                   placeholder="dd/mm/yyyy" required>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Dân tộc</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Kinh</option>
                                                            <option value="1">tày</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tôn giáo</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Không</option>
                                                            <option value="1">Phật giáo</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail4">Ngày vào đơn vị <span
                                                                style="color: red">*</span></label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control  datepicker"
                                                                   name="ngay_ban_hanh" id="ngay-ban-hanh-vb"
                                                                   placeholder="dd/mm/yyyy" required>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Cơ quan tuyển</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Ví dụ: Hội liên hiệp phụ nữ Việt Nam " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset>
                                                        <legend  style="font-size: 14px">Nơi sinh:</legend>
                                                        <div class="row">
                                                            <div class="col-md-5" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6"> Xã</label>
                                                                    <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                                           placeholder="Nhập tên xã " required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6">Huyện</label>
                                                                    <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                                           placeholder="Nhập tên huyện " required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6">Thành phố</label>
                                                                    <select class="form-control select2" name="nhom_don_vi">
                                                                        <option value="1">Hà nội</option>
                                                                        <option value="1">Hải Dương</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset>
                                                        <legend style="font-size: 14px">Quê quán:</legend>
                                                        <div class="row">
                                                            <div class="col-md-5" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6">Xã</label>
                                                                    <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                                           placeholder="Nhập tên xã " required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6">Huyện</label>
                                                                    <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                                           placeholder="Nhập tên huyện " required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6">Thành phố</label>
                                                                    <div class="form-group">
                                                                        <select class="form-control select2" name="nhom_don_vi">
                                                                            <option value="1">Hà nội</option>
                                                                            <option value="1">Hải Dương</option>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>


                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Hộ khẩu</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Nơi ở hiện nay</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Nghề nghiệp khi được tuyển</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Ví dụ: Cử nhân " required>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail4">Ngày bắt đầu đi làm <span
                                                                style="color: red">*</span></label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control  datepicker"
                                                                   name="ngay_ban_hanh" id="ngay-ban-hanh-vb"
                                                                   placeholder="dd/mm/yyyy" required>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Chức vụ hiện tại</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">Phó chủ tịch</option>
                                                                <option value="1">Chủ tịch</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Đơn vị</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">Ban tổ chức Quận ủy - Quận ủy Nam Từ Liêm</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Chức danh</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Chức danh " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Ngạch công chức</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">Chuyên viên chính A2.1</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Mã ngạch</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="010021 " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Bậc lương</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">7</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Hệ số lương</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">644</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail4">Ngày hưởng <span
                                                                style="color: red">*</span></label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control  datepicker"
                                                                   name="ngay_ban_hanh" id="ngay-ban-hanh-vb"
                                                                   placeholder="dd/mm/yyyy" required>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Sớm</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">3 Tháng</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Phụ cấp cv</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">3 </option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Phụ cấp khác</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="3 " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6"> % hưởng</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="100 " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6"> % V.khung</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="3 " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-4" >
                                                    <div class="form-group">
                                                        <input type="checkbox"  name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="3 " > BHYT &emsp;
                                                        <input type="checkbox"  name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="3 " > BHXH <br>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-3 col-sm">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Cập nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post clearfix">
                                <div class="user-block">

                                </div>
                                <!-- /.user-block -->

                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <!-- /.post -->
                        </div>
                        <div class="active tab-pane" id="activity2">
                            <!-- Post -->
                            <div class="post">
                                <div class="tab-pane" >
                                    <form class="" >
                                        <div class="col-md-12" style="background: white">
                                            <div class="row">

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Ngành CM chính</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Trình độ</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Bằng</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Ngành CM thứ 2</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Trình độ</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Bằng</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Trình độ phổ thông</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">TĐCM cao nhất</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Lý luận Chính trị</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Quản lý hành chính</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tin Học</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tiếng Anh</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Ngôn ngữ khác</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Trình độ:	</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Chưa xác định</option>
                                                            <option value="1">Chưa xác định</option>
                                                            {{--                                            @foreach($nhom_don_vi as $data)--}}
                                                            {{--                                                <option value="{{$data->id}}">{{$data->ten_nhom_don_vi}}</option>--}}
                                                            {{--                                            @endforeach--}}
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail4">Ngày sinh <span
                                                                style="color: red">*</span></label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control  datepicker"
                                                                   name="ngay_ban_hanh" id="ngay-ban-hanh-vb"
                                                                   placeholder="dd/mm/yyyy" required>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Dân tộc</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Kinh</option>
                                                            <option value="1">tày</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tôn giáo</label>
                                                        <select class="form-control select2" name="nhom_don_vi">
                                                            <option value="1">Không</option>
                                                            <option value="1">Phật giáo</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail4">Ngày vào đơn vị <span
                                                                style="color: red">*</span></label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control  datepicker"
                                                                   name="ngay_ban_hanh" id="ngay-ban-hanh-vb"
                                                                   placeholder="dd/mm/yyyy" required>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Cơ quan tuyển</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Ví dụ: Hội liên hiệp phụ nữ Việt Nam " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset>
                                                        <legend  style="font-size: 14px">Nơi sinh:</legend>
                                                        <div class="row">
                                                            <div class="col-md-5" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6"> Xã</label>
                                                                    <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                                           placeholder="Nhập tên xã " required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6">Huyện</label>
                                                                    <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                                           placeholder="Nhập tên huyện " required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6">Thành phố</label>
                                                                    <select class="form-control select2" name="nhom_don_vi">
                                                                        <option value="1">Hà nội</option>
                                                                        <option value="1">Hải Dương</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset>
                                                        <legend style="font-size: 14px">Quê quán:</legend>
                                                        <div class="row">
                                                            <div class="col-md-5" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6">Xã</label>
                                                                    <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                                           placeholder="Nhập tên xã " required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6">Huyện</label>
                                                                    <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                                           placeholder="Nhập tên huyện " required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail6">Thành phố</label>
                                                                    <div class="form-group">
                                                                        <select class="form-control select2" name="nhom_don_vi">
                                                                            <option value="1">Hà nội</option>
                                                                            <option value="1">Hải Dương</option>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>


                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Hộ khẩu</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Nơi ở hiện nay</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Nghề nghiệp khi được tuyển</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Ví dụ: Cử nhân " required>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail4">Ngày bắt đầu đi làm <span
                                                                style="color: red">*</span></label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control  datepicker"
                                                                   name="ngay_ban_hanh" id="ngay-ban-hanh-vb"
                                                                   placeholder="dd/mm/yyyy" required>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Chức vụ hiện tại</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">Phó chủ tịch</option>
                                                                <option value="1">Chủ tịch</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Đơn vị</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">Ban tổ chức Quận ủy - Quận ủy Nam Từ Liêm</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Chức danh</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="Chức danh " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Ngạch công chức</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">Chuyên viên chính A2.1</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Mã ngạch</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="010021 " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Bậc lương</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">7</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Hệ số lương</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">644</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail4">Ngày hưởng <span
                                                                style="color: red">*</span></label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control  datepicker"
                                                                   name="ngay_ban_hanh" id="ngay-ban-hanh-vb"
                                                                   placeholder="dd/mm/yyyy" required>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Sớm</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">3 Tháng</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Phụ cấp cv</label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="nhom_don_vi">
                                                                <option value="1">3 </option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6">Phụ cấp khác</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="3 " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6"> % hưởng</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="100 " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" >
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail6"> % V.khung</label>
                                                        <input type="text" class="form-control" name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="3 " required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-4" >
                                                    <div class="form-group">
                                                        <input type="checkbox"  name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="3 " > BHYT &emsp;
                                                        <input type="checkbox"  name="ten_khac" id="exampleInputEmail6"
                                                               placeholder="3 " > BHXH <br>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-3 col-sm">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Cập nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post clearfix">
                                <div class="user-block">

                                </div>
                                <!-- /.user-block -->

                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">Read more</a>
                                            <a class="btn btn-danger btn-xs">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-comments bg-yellow"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                        <!-- /.tab-pane -->


                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title"><i
                                                    class="fa fa-file-image-o"></i> Cập nhật ảnh đại diện</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="sokyhieu" class="">Chọn tệp
                                                        tin<br><small><i>(file phải là ảnh dạng jpg,png,..)</i></small>
                                                    </label>

                                                    <input type="file" multiple name="ten_file"
                                                           accept=".jpg,.png"/>
                                                    <input type="text" id="url-file" value="123"
                                                           class="hidden" name="txt_file[]">
                                                </div>
                                                <div class="form-group col-md-4" >
                                                    <button class="btn btn-primary"><i class="fa fa-cloud-upload"></i> Tải lên</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        function showModal() {
        $("#myModal").modal('show');
        }
    </script>

@endsection
<style>
    fieldset {
        border-color: #F00;
        border-style: solid;
    }

    /*legend {*/
    /*    background-color: gray;*/
    /*    color: white;*/
    /*    padding: 5px 10px;*/
    /*}*/

    /*input {*/
    /*    margin: 5px;*/
    /*}*/
</style>


<form class="" action="{{route('themCanBoSL')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="box box-danger" style="font-size: 12px;border-top-color: #119bea;">
        <div class="box-header with-border">
            <h3 class="box-title" style="color: #0a0a0a;font-weight: bold">I. Thông tin hồ sơ</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <div class="box-body">
            <div class="col-md-3 " >
                <div class="form-group" >
                    <label for="exampleInputEmail1">Họ tên khai sinh <span style="color: red">(*)</span></label>
                    <input type="text" class="form-control" name="ten" id="exampleInputEmail1" value=""
                           placeholder="Nhập tên " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Tên gọi khác</label>
                    <input type="text" class="form-control" name="ten_khac" value=""
                           placeholder="Nhập tên ">
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Bí danh</label>
                    <input type="text" class="form-control" name="bi_danh" value=""
                           placeholder=" ">
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Giới tính <span style="color: red">(*)</span></label>
                    <select class="form-control select2" name="gioi_tinh">
                        <option value="1" >Nam</option>
                        <option value="2" >Nữ</option>
                    </select>

                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày sinh <span style="color: red">(*)</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" autocomplete="off"
                               name="ngay_sinh" id="ngay_sinh" value=""
                               placeholder="dd/mm/yyyy" required>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Dân tộc <span style="color: red">(*)</span></label>
                    <select class="form-control select2" name="dan_toc" required>
                        <option value="">--Lựa chọn--</option>
                        @foreach($danToc as $dsDanToc)
                            <option value="{{$dsDanToc->id}}"  >{{$dsDanToc->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Tôn giáo <span style="color: red">(*)</span></label>
                    <select class="form-control select2" name="ton_giao" required>
                        <option value="">--Lựa chọn--</option>
                        @foreach($tonGiao as $dsTonGiao)
                            <option value="{{$dsTonGiao->id}}" >{{$dsTonGiao->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> Số chứng minh thư <span style="color: red">(*)</span></label>
                    <input type="text" class="form-control" name="cmnd" value=""
                           placeholder="Nhập số chứng minh thư.. " required>
                </div>
            </div>


            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày cấp chứng minh thư <span style="color: red">(*)</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" autocomplete="off"
                               name="ngay_cap_cmt" id="ngay_cap_cmt" value=""
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> Nơi cấp <span style="color: red">(*)</span></label>
                    <input type="text" class="form-control" name="noi_cap" value=""
                           placeholder="Nơi cấp chứng minh thư.. " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> Email</label>
                    <input type="text" class="form-control" name="email" value=""
                           placeholder="Nhập email. " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> Số điện thoại</label>
                    <input type="text" class="form-control" name="so_dien_thoai" value=""
                           placeholder="Nhập số điện thoại.. " >
                </div>
            </div>

            <div class="col-md-12">
                <fieldset>
                    <legend  style="font-size: 14px">Nơi sinh: <span style="color: red">(*)</span></legend>
                    <div class="row">
                        <div class="col-md-5" >
                            <div class="form-group">
                                <label for="exampleInputEmail6"> Xã</label>
                                <input type="text" class="form-control" name="noi_sinh_xa" value=""
                                       placeholder="Nhập tên xã " required>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Huyện</label>
                                <input type="text" class="form-control" name="noi_sinh_huyen"  value=""
                                       placeholder="Nhập tên huyện " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Thành phố</label>
                                <select class="form-control select2" name="noi_sinh_tp" required>
                                    <option value="">--Lựa chọn--</option>
                                    @foreach($thanhPho as $dsThanhPho1)
                                        <option value="{{$dsThanhPho1->id}}"  >{{$dsThanhPho1->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-12">
                <fieldset>
                    <legend style="font-size: 14px">Quê quán: <span style="color: red">(*)</span></legend>
                    <div class="row">
                        <div class="col-md-5" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Xã</label>
                                <input type="text" class="form-control" name="que_quan_xa"  value=""
                                       placeholder="Nhập tên xã " required>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Huyện</label>
                                <input type="text" class="form-control" name="que_quan_huyen"  value=""
                                       placeholder="Nhập tên huyện " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Thành phố</label>
                                <div class="form-group">
                                    <select class="form-control select2" name="que_quan_tp" required>
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($thanhPho as $dsThanhPho)
                                            <option value="{{$dsThanhPho->id}}" >{{$dsThanhPho->ten}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail6">Hộ khẩu <span style="color: red">(*)</span></label>
                    <input type="text" class="form-control" name="ho_khau" value=""
                           placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                </div>
            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Nơi ở hiện nay <span style="color: red">(*)</span></label>
                    <input type="text" class="form-control" name="noi_o_hien_nay" value=""
                           placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                </div>
            </div>
        </div>

    </div>
    <div class="box box-danger" style="font-size: 12px;border-top-color: #119bea;">
        <div class="box-header with-border">
            <h3 class="box-title" style="color: #0a0a0a;font-weight: bold">II. Công tác</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <div class="box-body">
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Cơ quan tuyển</label>
                    <input type="text" class="form-control" name="co_quan_tuyen"  value=""
                           placeholder="Ví dụ: Hội liên hiệp phụ nữ Việt Nam " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày vào đơn vị </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" autocomplete="off"
                               name="ngay_vao_don_vi" id="ngay_vao_don_vi" value=""
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Nghề nghiệp trước khi được tuyển</label>
                    <input type="text" class="form-control" name="nghe_nghiep_truoc_khi_tuyen" value=""
                           placeholder="Ví dụ: Cử nhân " >
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Nghề nghiệp khi được tuyển</label>
                    <input type="text" class="form-control" name="nghe_nghiep_khi_tuyen" value=""
                           placeholder="Ví dụ: Cử nhân " >
                </div>
            </div>
            <div class="col-md-12">
                <fieldset>
                    <legend style="font-size: 14px">Vị trí tuyển dụng: <span style="color: red">(*)</span></legend>
                    <div class="row">
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Công chức </label>
                                <select class="form-control select2" name="vi_tri_cong_chuc" >
                                    <option value="">--Lựa chọn--</option>
                                    <option value="Dự bị" >Dự bị</option>
                                    <option value="Tập sự" >Tập sự</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Viên chức </label>
                                <select class="form-control select2" name="vi_tri_vien_chuc" >
                                    <option value="">--Lựa chọn--</option>
                                    <option value="Viên chức tuyển dụng chính thức trước tháng 7/2003" >Viên chức tuyển dụng chính thức trước tháng 7/2003</option>
                                    <option value="Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng có thời hạn" >Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng có thời hạn</option>
                                    <option value="Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng thử việc" >Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng thử việc</option>
                                    <option value="Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng đặc biệt"  ></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Nhân viên thừa hành, phục vụ </label>
                                <div class="form-group">
                                    <select class="form-control select2" name="vi_tri_nhan_vien" >
                                        <option value="">--Lựa chọn--</option>
                                        <option value="Tuyển dụng chính thức" >Tuyển dụng chính thức</option>
                                        <option value="Hợp đồng không xác định thời hạn"  >Hợp đồng không xác định thời hạn</option>
                                        <option value="Hợp đồng có thời hạn" >Hợp đồng có thời hạn</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Lĩnh vực theo dõi </label>
                    <input type="text" class="form-control" name="linh_vuc_theo_doi" value=""
                           placeholder=" " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày tuyển dụng đầu tiên<span style="color: red">(*)</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value=""
                               name="tuyen_dung_dau_tien" required autocomplete="off"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày tuyển dụng chính thức<span style="color: red">(*)</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value=""
                               name="tuyen_dung_chinh_thuc" required autocomplete="off"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày vào cơ quan hiện nay <span style="color: red">(*)</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value=""
                               name="ngay_bat_dau_di_lam" required autocomplete="off"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-4" >
                <div class="form-group">
                    <label class="">
                        <div class="icheckbox_flat-green checked" aria-checked="false" aria-disabled="false" style="position: relative;">
                            <input type="checkbox"  class="flat-red" id="cb_btv_thanh_uy" value="1"  name="cb_btv_thanh_uy" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        </div>
                    </label>&emsp; <label  style="font-weight: bold;font-size: 12px" for="cb_btv_thanh_uy">Ban thường vụ thành ủy quản lý</label>

                </div>
            </div>
            <div class="col-md-3 mt-4" >
                <div class="form-group">
                    <label class="">
                        <div class="icheckbox_flat-green checked" aria-checked="false" aria-disabled="false" style="position: relative;">
                            <input type="checkbox"  class="flat-red" id="cb_btv_quan_uy" value="1"  name="cb_btv_quan_uy" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        </div>
                    </label>&emsp; <label  style="font-weight: bold;font-size: 12px" for="cb_btv_quan_uy">Ban thường vụ quận ủy quản lý</label>

                </div>
            </div>
            <div class="col-md-3 mt-4" >
                <div class="form-group">
                    <label class="">
                        <div class="icheckbox_flat-green checked" aria-checked="false" aria-disabled="false" style="position: relative;">
                            <input type="checkbox" value="1" class="flat-red" id="trung_uong"  name="trung_uong" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        </div>
                    </label>&emsp; <label  style="font-weight: bold;font-size: 12px" for="trung_uong">Trung ương quản lý</label>

                </div>
            </div>






        </div>

    </div>
    <div class="box box-danger" style="font-size: 12px;border-top-color: #119bea;">
        <div class="box-header with-border">
            <h3 class="box-title" style="color: #0a0a0a;font-weight: bold">III. Lương, phụ cấp hiện hưởng</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <div class="box-body">
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Đơn vị <span style="color: red">(*)</span></label>
                    <div class="form-group">
                        <select class="form-control select2" name="don_vi" required>
                            <option value="">--Lựa chọn--</option>
                            @foreach($donVi as $dsdonVi)
                                <option value="{{$dsdonVi->id}}">{{$dsdonVi->ten_don_vi}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Chức vụ hiện tại <span style="color: red">(*)</span></label>
                    <div class="form-group">
                        <select class="form-control select2" name="chuc_vu_hien_tai" required>
                            <option value="">--Lựa chọn--</option>
                            @foreach($chucVuHienTai as $dschucVuHienTai)
                                <option value="{{$dschucVuHienTai->id}}">{{$dschucVuHienTai->ten}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày bổ nhiệm </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value=""
                               name="ngay_bo_nhiem_chuc_vu_hien_tai" id="ngay_bo_nhiem_chuc_vu_hien_tai"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Hệ số phụ cấp chức vụ</label>
                    <input type="text" class="form-control" name="he_so_phu_cap_chuc_vu_hien_tai" value=""
                           placeholder="Hệ số phụ cấp chức vụ " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Chức vụ, chức danh kiêm nhiệm </label>
                    <div class="form-group">
                        <select class="form-control select2" name="chuc_vu_kiem_nhiem" >
                            <option value="">--Lựa chọn--</option>
                            @foreach($chucVuHienTai as $dschucVuHienTai)
                                <option value="{{$dschucVuHienTai->id}}" >{{$dschucVuHienTai->ten}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày bổ nhiệm </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value=""
                               name="ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem" id="ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Hệ số phụ cấp chức vụ kiêm nhiệm</label>
                    <input type="text" class="form-control" name="he_so_phu_cap_chuc_vu_chuc_vu_kiem_nhiem" value=""
                           placeholder="Hệ số phụ cấp chức vụ " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Chức danh</label>
                    <input type="text" class="form-control" name="chuc_danh" value=""
                           placeholder="Chức danh " >
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail6">Ngạch công chức</label>
                    <div class="form-group">
                        <select class="form-control select2" name="ngach_cong_chuc">
                            <option value="">--Lựa chọn--</option>
                            @foreach($ngach as $dsngach)
                                <option value="{{$dsngach->id}}" >{{$dsngach->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Mã ngạch</label>
                    <input type="text" class="form-control" name="ma_ngach" value=""
                           placeholder="010021 " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày bổ nhiệm ngạch </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value=""
                               name="ngay_bo_nhiem_ngach" id="ngay_bo_nhiem_ngach" autocomplete="off"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Bậc lương</label>
                    <div class="form-group">
                        <select class="form-control select2" name="bac_luong">
                            <option value="">--Lựa chọn--</option>
                            @foreach($bacLuong as $dsbacLuong)
                                <option value="{{$dsbacLuong->id}}" >{{$dsbacLuong->ten}} - Bậc {{$dsbacLuong->bac}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Hệ số lương</label>
                    <div class="form-group">
                        <select class="form-control select2" name="he_so_luong">
                            <option value="">--Lựa chọn--</option>
                            @foreach($bacLuong as $dsbacLuong)
                                <option value="{{$dsbacLuong->id}}" >{{$dsbacLuong->he_so_luong}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày hưởng </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value=""
                               name="ngay_huong" id="ngay_huong" autocomplete="off"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Mốc xét tăng lương </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value=""
                               name="moc_xet_tang_luong" id="moc_xet_tang_luong" autocomplete="off"
                               placeholder="dd/mm/yyyy" >
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
                        <select class="form-control select2" name="som">
                            <option value="1">3 Tháng</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Phụ cấp cv</label>
                    <div class="form-group">
                        <select class="form-control select2" name="phu_cap">
                            <option value="">--Lựa chọn--</option>
                            @foreach($phuCap as $dsphuCap)
                                <option value="{{$dsphuCap->id}}" >{{$dsphuCap->ten}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Phụ cấp khác</label>
                    <input type="text" class="form-control" name="phu_cap_khac" id="" value=""
                           placeholder="3 " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> % hưởng</label>
                    <input type="text" class="form-control" name="phan_tram_huong" id="" value=""
                           placeholder="100 " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> % V.khung</label>
                    <input type="text" class="form-control" name="khung" id="" value=""
                           placeholder="3 " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày hưởng phụ cấp V.khung </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value=""
                               name="ngay_huong_vuot_khung" id="ngay_huong_vuot_khung" autocomplete="off"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> Số sổ bảo hiểm</label>
                    <input type="text" class="form-control" name="so_so_bao_hiem" id="" value=""
                           placeholder=" " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày cấp sổ bảo hiểm</label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value=""
                               name="ngay_cap_bao_hiem" id="ngay_cap_bao_hiem" autocomplete="off"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-4" >
                <div class="form-group">
                    <input type="checkbox"  name="bhyt"
                           placeholder="3 " value="1" > BHYT &emsp;
                    <input type="checkbox"  name="bhxh"
                           placeholder="3 " value="1" > BHXH <br>
                </div>
            </div>
        </div>

    </div>
    <div class="box-footer">
        @can(\App\Common\AllPermission::suaCanBo())
            <div class="form-group">
                <div class="col-md-3 col-sm">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Tiếp tục</button>
                </div>
            </div>
        @endcan
    </div>

</form>

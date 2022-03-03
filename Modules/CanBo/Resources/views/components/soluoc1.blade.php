<form class="" action="{{route('postSoLuoc1',$canBo->id)}}" method="POST">
    @csrf
    <div class="col-md-12" style="background: white">
        <div class="row">
            <div class="col-md-3 " >
                <div class="form-group" >
                    <label for="exampleInputEmail1">Họ tên khai sinh <span style="color: red">(*)</span></label>
                    <input type="text" class="form-control" name="ten" id="exampleInputEmail1" value="{{$canBo->ho_ten}}"
                           placeholder="Nhập tên " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Tên gọi khác</label>
                    <input type="text" class="form-control" name="ten_khac" value="{{$canBo->ten_khac}}"
                           placeholder="Nhập tên ">
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Bí danh</label>
                    <input type="text" class="form-control" name="bi_danh" value="{{$canBo->bi_danh}}"
                           placeholder=" ">
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Giới tính <span style="color: red">(*)</span></label>
                    <select class="form-control select2" name="gioi_tinh">
                        <option value="1" {{$canBo->gioi_tinh == 1 ? 'selected':''}}>Nam</option>
                        <option value="2" {{$canBo->gioi_tinh == 2 ? 'selected':''}}>Nữ</option>
                    </select>

                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày sinh <span style="color: red">(*)</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="ngay_sinh" id="ngay_sinh" value="{{ isset($canBo) && $canBo->ngay_sinh ? formatDMY($canBo->ngay_sinh) : ''}}"
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
                        @foreach($danToc as $dsDanToc)
                        <option value="{{$dsDanToc->id}}"  {{$canBo->dan_toc == $dsDanToc->id ? 'selected' : ''}}>{{$dsDanToc->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Tôn giáo <span style="color: red">(*)</span></label>
                    <select class="form-control select2" name="ton_giao" required>
                        @foreach($tonGiao as $dsTonGiao)
                            <option value="{{$dsTonGiao->id}}" {{$canBo->ton_giao == $dsTonGiao->id ? 'selected' : ''}}>{{$dsTonGiao->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> Số chứng minh thư</label>
                    <input type="text" class="form-control" name="cmnd" value="{{$canBo->cmnd}}"
                           placeholder="Nhập số chứng minh thư.. " required>
                </div>
            </div>


            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày cấp chứng minh thư </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="ngay_cap_cmt" id="ngay_cap_cmt" value="{{ isset($canBo) && $canBo->ngay_cap_cmt ? formatDMY($canBo->ngay_cap_cmt) : ''}}"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> Nơi cấp</label>
                    <input type="text" class="form-control" name="noi_cap" value="{{$canBo->noi_cap}}"
                           placeholder="Nơi cấp chứng minh thư.. " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> Email</label>
                    <input type="text" class="form-control" name="email" value="{{$canBo->email}}"
                           placeholder="Nhập email. " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> Số điện thoại</label>
                    <input type="text" class="form-control" name="so_dien_thoai" value="{{$canBo->so_dien_thoai}}"
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
                                <input type="text" class="form-control" name="noi_sinh_xa" value="{{$canBo->noi_sinh}}"
                                       placeholder="Nhập tên xã " required>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Huyện</label>
                                <input type="text" class="form-control" name="noi_sinh_huyen"  value="{{$canBo->huyen_noi_sinh}}"
                                       placeholder="Nhập tên huyện " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Thành phố</label>
                                <select class="form-control select2" name="noi_sinh_tp" required>
                                    @foreach($thanhPho as $dsThanhPho1)
                                        <option value="{{$dsThanhPho1->id}}"  {{$canBo->thanh_pho_noi_sinh == $dsThanhPho1->id ? 'selected' : ''}}>{{$dsThanhPho1->ten}}</option>
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
                                <input type="text" class="form-control" name="que_quan_xa"  value="{{$canBo->que_quan}}"
                                       placeholder="Nhập tên xã " required>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Huyện</label>
                                <input type="text" class="form-control" name="que_quan_huyen"  value="{{$canBo->huyen_que_quan}}"
                                       placeholder="Nhập tên huyện " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Thành phố</label>
                                <div class="form-group">
                                    <select class="form-control select2" name="que_quan_tp" required>
                                        @foreach($thanhPho as $dsThanhPho)
                                            <option value="{{$dsThanhPho->id}}" {{$canBo->thanh_pho_que_quan == $dsThanhPho->id ? 'selected' : ''}}>{{$dsThanhPho->ten}}</option>
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
                    <input type="text" class="form-control" name="ho_khau" value="{{$canBo->ho_khau}}"
                           placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                </div>
            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Nơi ở hiện nay <span style="color: red">(*)</span></label>
                    <input type="text" class="form-control" name="noi_o_hien_nay" value="{{$canBo->noi_o_hien_nay}}"
                           placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Cơ quan tuyển</label>
                    <input type="text" class="form-control" name="co_quan_tuyen"  value="{{$canBo->co_quan_tuyen}}"
                           placeholder="Ví dụ: Hội liên hiệp phụ nữ Việt Nam " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày vào đơn vị </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="ngay_vao_don_vi" id="ngay_vao_don_vi" value="{{ isset($canBo) && $canBo->ngay_vao_don_vi ? formatDMY($canBo->ngay_vao_don_vi) : ''}}"
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
                    <input type="text" class="form-control" name="nghe_nghiep_truoc_khi_tuyen" value="{{$canBo->nghe_nghiep_truoc_khi_tuyen}}"
                           placeholder="Ví dụ: Cử nhân " >
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Nghề nghiệp khi được tuyển</label>
                    <input type="text" class="form-control" name="nghe_nghiep_khi_tuyen" value="{{$canBo->nghe_nghiep_khi_duoc_tuyen}}"
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
                                <select class="form-control select2" name="vi_tri_cong_chuc" required>
                                    <option value="">--Lựa chọn--</option>
                                    <option value="Dự bị" {{$canBo->vi_tri_cong_chuc == 'Dự bị' ? 'selected' : ''}}>Dự bị</option>
                                    <option value="Tập sự" {{$canBo->vi_tri_cong_chuc == 'Tập sự' ? 'selected' : ''}}>Tập sự</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Viên chức </label>
                                <select class="form-control select2" name="vi_tri_vien_chuc" required>
                                    <option value="">--Lựa chọn--</option>
                                    <option value="Viên chức tuyển dụng chính thức trước tháng 7/2003" {{$canBo->vi_tri_vien_chuc == 'Viên chức tuyển dụng chính thức trước tháng 7/2003' ? 'selected' : ''}}>Viên chức tuyển dụng chính thức trước tháng 7/2003</option>
                                    <option value="Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng có thời hạn" {{$canBo->vi_tri_vien_chuc == 'Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng có thời hạn' ? 'selected' : ''}}>Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng có thời hạn</option>
                                    <option value="Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng thử việc" {{$canBo->vi_tri_vien_chuc == 'Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng thử việc' ? 'selected' : ''}}>Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng thử việc</option>
                                    <option value="Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng đặc biệt" {{$canBo->vi_tri_vien_chuc == 'Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng đặc biệt' ? 'selected' : ''}}>Viên chức tuyển dụng chính thức từ tháng 7/2003 đến nay - Hợp đồng đặc biệt</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Nhân viên thừa hành, phục vụ </label>
                                <div class="form-group">
                                    <select class="form-control select2" name="vi_tri_nhan_vien" required>
                                        <option value="">--Lựa chọn--</option>
                                        <option value="Tuyển dụng chính thức" {{$canBo->vi_tri_nhan_vien == 'Tuyển dụng chính thức' ? 'selected' : ''}}>Tuyển dụng chính thức</option>
                                        <option value="Hợp đồng không xác định thời hạn" {{$canBo->vi_tri_nhan_vien == 'Hợp đồng không xác định thời hạn' ? 'selected' : ''}}>Hợp đồng không xác định thời hạn</option>
                                        <option value="Hợp đồng có thời hạn" {{$canBo->vi_tri_nhan_vien == 'Hợp đồng có thời hạn' ? 'selected' : ''}}>Hợp đồng có thời hạn</option>
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
                    <input type="text" class="form-control" name="linh_vuc_theo_doi" value="{{$canBo->linh_vuc_theo_doi}}"
                           placeholder=" " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày tuyển dụng đầu tiên<span style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{ isset($canBo) && $canBo->tuyen_dung_dau_tien ? formatDMY($canBo->tuyen_dung_dau_tien) : ''}}"
                               name="tuyen_dung_dau_tien"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày tuyển dụng chính thức<span style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{ isset($canBo) && $canBo->tuyen_dung_chinh_thuc ? formatDMY($canBo->tuyen_dung_chinh_thuc) : ''}}"
                               name="tuyen_dung_chinh_thuc"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày vào cơ quan hiện nay <span style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{ isset($canBo) && $canBo->ngay_bat_dau_di_lam ? formatDMY($canBo->ngay_bat_dau_di_lam) : ''}}"
                               name="ngay_bat_dau_di_lam"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Đơn vị <span style="color: red">(*)</span></label>
                    <div class="form-group">
                        <select class="form-control select2" name="don_vi" required>
                            @foreach($donVi as $dsdonVi)
                                <option value="{{$dsdonVi->id}}" {{$canBo->don_vi == $dsdonVi->id ? 'selected' : ''}}>{{$dsdonVi->ten_don_vi}}</option>
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
                            @foreach($chucVuHienTai as $dschucVuHienTai)
                                <option value="{{$dschucVuHienTai->id}}" {{$canBo->chuc_vu_hien_tai == $dschucVuHienTai->id ? 'selected' : ''}}>{{$dschucVuHienTai->ten}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày bổ nhiệm </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{isset($canBo->ngay_bo_nhiem_chuc_vu_hien_tai) ?formatDMY($canBo->ngay_bo_nhiem_chuc_vu_hien_tai):''}}"
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
                    <input type="text" class="form-control" name="he_so_phu_cap_chuc_vu_hien_tai" value="{{$canBo->he_so_phu_cap_chuc_vu_hien_tai}}"
                           placeholder="Hệ số phụ cấp chức vụ " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Chức vụ, chức danh kiêm nhiệm </label>
                    <div class="form-group">
                        <select class="form-control select2" name="chuc_vu_kiem_nhiem" >
                            @foreach($chucVuHienTai as $dschucVuHienTai)
                                <option value="{{$dschucVuHienTai->id}}" {{$canBo->chuc_vu_kiem_nhiem == $dschucVuHienTai->id ? 'selected' : ''}}>{{$dschucVuHienTai->ten}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày bổ nhiệm </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{isset($canBo->ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem) ? formatDMY($canBo->ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem) : ''}}"
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
                    <label for="exampleInputEmail6">Hệ số phụ cấp chức vụ</label>
                    <input type="text" class="form-control" name="he_so_phu_cap_chuc_vu_chuc_vu_kiem_nhiem" value="{{$canBo->he_so_phu_cap_chuc_vu_chuc_vu_kiem_nhiem}}"
                           placeholder="Hệ số phụ cấp chức vụ " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Chức danh</label>
                    <input type="text" class="form-control" name="chuc_danh" value="{{$canBo->chuc_danh}}"
                           placeholder="Chức danh " >
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail6">Ngạch công chức</label>
                    <div class="form-group">
                        <select class="form-control select2" name="ngach_cong_chuc">
                            @foreach($ngach as $dsngach)
                                <option value="{{$dsngach->id}}" {{$canBo->ngach_cong_chuc == $dsngach->id ? 'selected' : ''}}>{{$dsngach->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Mã ngạch</label>
                    <input type="text" class="form-control" name="ma_ngach" value="{{$canBo->ma_ngach}}"
                           placeholder="010021 " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày bổ nhiệm ngạch </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{isset($canBo->ngay_bo_nhiem_ngach) ? formatDMY($canBo->ngay_bo_nhiem_ngach) : ''}}"
                               name="ngay_bo_nhiem_ngach" id="ngay_bo_nhiem_ngach"
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
                            @foreach($bacLuong as $dsbacLuong)
                                <option value="{{$dsbacLuong->id}}" {{$canBo->bac_luong == $dsbacLuong->id ? 'selected' : ''}}>{{$dsbacLuong->bac_luong}}</option>
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
                            @foreach($bacLuong as $dsbacLuong)
                                <option value="{{$dsbacLuong->id}}" {{$canBo->he_so_luong == $dsbacLuong->id ? 'selected' : ''}}>{{$dsbacLuong->he_so_luong}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày hưởng </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{isset($canBo->ngay_huong) ? formatDMY($canBo->ngay_huong) : ''}}"
                               name="ngay_huong" id="ngay_huong"
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
                        <input type="text" class="form-control  datepicker" value="{{isset($canBo->moc_xet_tang_luong) ? formatDMY($canBo->moc_xet_tang_luong) : ''}}"
                               name="moc_xet_tang_luong" id="moc_xet_tang_luong"
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
                            @foreach($phuCap as $dsphuCap)
                                <option value="{{$dsphuCap->id}}" {{$canBo->phu_cap_cv == $dsphuCap->id ? 'selected' : ''}}>{{$dsphuCap->ten}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Phụ cấp khác</label>
                    <input type="text" class="form-control" name="phu_cap_khac" id="" value="{{$canBo->phu_cap_khac}}"
                           placeholder="3 " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> % hưởng</label>
                    <input type="text" class="form-control" name="phan_tram_huong" id="" value="{{$canBo->phan_tram_huong}}"
                           placeholder="100 " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> % V.khung</label>
                    <input type="text" class="form-control" name="khung" id="" value="{{$canBo->phan_tram_khung}}"
                           placeholder="3 " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày hưởng phụ cấp V.khung </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{isset($canBo->ngay_huong_vuot_khung) ? formatDMY($canBo->ngay_huong_vuot_khung): ''}}"
                               name="ngay_huong_vuot_khung" id="ngay_huong_vuot_khung"
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
                    <input type="text" class="form-control" name="so_so_bao_hiem" id="" value="{{$canBo->so_so_bao_hiem}}"
                           placeholder=" " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày cấp sổ bảo hiểm</label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{isset($canBo->ngay_cap_bao_hiem) ? formatDMY($canBo->ngay_cap_bao_hiem): ''}}"
                               name="ngay_cap_bao_hiem" id="ngay_cap_bao_hiem"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-4" >
                <div class="form-group">
                    <input type="checkbox"  name="bhyt"   {{$canBo->BHYT == 1 ? 'checked' : ''}}
                           placeholder="3 " value="1" > BHYT &emsp;
                    <input type="checkbox"  name="bhxh" {{$canBo->BHXH == 1 ? 'checked' : ''}}
                           placeholder="3 " value="1" > BHXH <br>
                </div>
            </div>

        </div>
    </div>
    @can(\App\Common\AllPermission::suaCanBo())
        <div class="form-group">
            <div class="col-md-3 col-sm">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Cập nhật</button>
            </div>
        </div>
    @endcan
</form>

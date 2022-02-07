<form class="" action="{{route('themCanBoSL')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12" style="background: white">
        <div class="row">
            <div class="col-md-12 "  style="margin-bottom: 20px">
                <a onclick="showModal()" style="cursor: pointer">
                            <span style="color: white;font-size: 14px"><i class="fa fa-folder-open-o"></i>
                                <img class="profile-user-img img-responsive img-circle" src="{{asset('logobo.jpg')}}" alt="User profile picture">
                            </span></a>
            </div>
            <div class="col-md-3 " >
                <div class="form-group" >
                    <label for="exampleInputEmail1">Họ tên</label>
                    <input type="text" class="form-control" name="ten" id="exampleInputEmail1" value=""
                           placeholder="Nhập tên " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Tên gọi khác</label>
                    <input type="text" class="form-control" name="ten_khac" value=""
                           placeholder="Nhập tên " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Giới tính</label>
                    <select class="form-control select2" name="gioi_tinh">
                        <option value="1" >Nam</option>
                        <option value="2" >Nữ</option>
                    </select>

                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày sinh <span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
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
                    <label for="exampleInputEmail1">Dân tộc</label>
                    <select class="form-control select2" name="dan_toc">
                        @foreach($danToc as $dsDanToc)
                        <option value="{{$dsDanToc->id}}"  >{{$dsDanToc->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Tôn giáo</label>
                    <select class="form-control select2" name="ton_giao">
                        @foreach($tonGiao as $dsTonGiao)
                            <option value="{{$dsTonGiao->id}}" >{{$dsTonGiao->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày vào đơn vị <span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="ngay_vao_don_vi" id="ngay_vao_don_vi"
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
                    <input type="text" class="form-control" name="co_quan_tuyen"
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
                                <input type="text" class="form-control" name="noi_sinh_xa"
                                       placeholder="Nhập tên xã " required>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Huyện</label>
                                <input type="text" class="form-control" name="noi_sinh_huyen"
                                       placeholder="Nhập tên huyện " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Thành phố</label>
                                <select class="form-control select2" name="noi_sinh_tp">
                                    @foreach($thanhPho as $dsThanhPho1)
                                        <option value="{{$dsThanhPho1->id}}" >{{$dsThanhPho1->ten}}</option>
                                    @endforeach
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
                                <input type="text" class="form-control" name="que_quan_xa"
                                       placeholder="Nhập tên xã " required>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Huyện</label>
                                <input type="text" class="form-control" name="que_quan_huyen"
                                       placeholder="Nhập tên huyện " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Thành phố</label>
                                <div class="form-group">
                                    <select class="form-control select2" name="que_quan_tp">
                                        @foreach($thanhPho as $dsThanhPho)
                                            <option value="{{$dsThanhPho->id}}">{{$dsThanhPho->ten}}</option>
                                        @endforeach
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
                    <input type="text" class="form-control" name="ho_khau"
                           placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                </div>
            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Nơi ở hiện nay</label>
                    <input type="text" class="form-control" name="noi_o_hien_nay"
                           placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Nghề nghiệp khi được tuyển</label>
                    <input type="text" class="form-control" name="nghe_nghiep_khi_tuyen"
                           placeholder="Ví dụ: Cử nhân " required>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày bắt đầu đi làm <span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="ngay_bat_dau_di_lam" id="ngay-ban-hanh-vb"
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
                        <select class="form-control select2" name="chuc_vu_hien_tai">
                            @foreach($chucVuHienTai as $dschucVuHienTai)
                                <option value="{{$dschucVuHienTai->id}}" >{{$dschucVuHienTai->ten}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Đơn vị</label>
                    <div class="form-group">
                        <select class="form-control select2" name="don_vi">
                            @foreach($donVi as $dsdonVi)
                                <option value="{{$dsdonVi->id}}" >{{$dsdonVi->ten_don_vi}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Chức danh</label>
                    <input type="text" class="form-control" name="chuc_danh"
                           placeholder="Chức danh " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Ngạch công chức</label>
                    <div class="form-group">
                        <select class="form-control select2" name="ngach_cong_chuc">
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
                    <input type="text" class="form-control" name="ma_ngach"
                           placeholder="010021 " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Bậc lương</label>
                    <div class="form-group">
                        <select class="form-control select2" name="bac_luong">
                            @foreach($bacLuong as $dsbacLuong)
                                <option value="{{$dsbacLuong->id}}">{{$dsbacLuong->bac_luong}}</option>
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
                                <option value="{{$dsbacLuong->id}}">{{$dsbacLuong->he_so_luong}}</option>
                            @endforeach

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
                               name="ngay_huong" id="ngay_huong"
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
                                <option value="{{$dsphuCap->id}}" >{{$dsphuCap->ten}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Phụ cấp khác</label>
                    <input type="text" class="form-control" name="phu_cap_khac" id=""
                           placeholder="3 " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> % hưởng</label>
                    <input type="text" class="form-control" name="phan_tram_huong" id=""
                           placeholder="100 " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> % V.khung</label>
                    <input type="text" class="form-control" name="khung" id=""
                           placeholder="3 " required>
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

    <div class="form-group">
        <div class="col-md-3 col-sm">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Tiếp tục</button>
        </div>
    </div>
</form>

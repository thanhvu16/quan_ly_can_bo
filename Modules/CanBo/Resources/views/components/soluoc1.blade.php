<form class="" action="{{route('postSoLuoc1',$canBo->id)}}" method="POST">
    @csrf
    <div class="col-md-12" style="background: white">
        <div class="row">
            <div class="col-md-3 " >
                <div class="form-group" >
                    <label for="exampleInputEmail1">Họ tên</label>
                    <input type="text" class="form-control" name="ten" id="exampleInputEmail1" value="{{$canBo->ho_ten}}"
                           placeholder="Nhập tên " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Tên gọi khác</label>
                    <input type="text" class="form-control" name="ten_khac" value="{{$canBo->ten_khac}}"
                           placeholder="Nhập tên " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Giới tính</label>
                    <select class="form-control select2" name="gioi_tinh">
                        <option value="1" {{$canBo->gioi_tinh == 1 ? 'selected':''}}>Nam</option>
                        <option value="2" {{$canBo->gioi_tinh == 2 ? 'selected':''}}>Nữ</option>
                    </select>

                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày sinh <span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="ngay_sinh" id="ngay_sinh" value="{{formatDMY($canBo->ngay_sinh)}}"
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
                        <option value="{{$dsDanToc->id}}"  {{$canBo->dan_toc == $dsDanToc->id ? 'selected' : ''}}>{{$dsDanToc->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Tôn giáo</label>
                    <select class="form-control select2" name="ton_giao">
                        @foreach($tonGiao as $dsTonGiao)
                            <option value="{{$dsTonGiao->id}}" {{$canBo->ton_giao == $dsTonGiao->id ? 'selected' : ''}}>{{$dsTonGiao->ten}}</option>
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
                               name="ngay_vao_don_vi" id="ngay_vao_don_vi" value="{{formatDMY($canBo->ngay_vao_don_vi)}}"
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
                    <input type="text" class="form-control" name="co_quan_tuyen"  value="{{$canBo->co_quan_tuyen}}"
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
                                <select class="form-control select2" name="noi_sinh_tp">
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
                    <legend style="font-size: 14px">Quê quán:</legend>
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
                                    <select class="form-control select2" name="que_quan_tp">
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


            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Hộ khẩu</label>
                    <input type="text" class="form-control" name="ho_khau" value="{{$canBo->ho_khau}}"
                           placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                </div>
            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Nơi ở hiện nay</label>
                    <input type="text" class="form-control" name="noi_o_hien_nay" value="{{$canBo->noi_o_hien_nay}}"
                           placeholder="Ví dụ: 23 Bạch Mai, Hà Nội " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Nghề nghiệp khi được tuyển</label>
                    <input type="text" class="form-control" name="nghe_nghiep_khi_tuyen" value="{{$canBo->nghe_nghiep_khi_duoc_tuyen}}"
                           placeholder="Ví dụ: Cử nhân " required>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày bắt đầu đi làm <span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{formatDMY($canBo->ngay_bat_dau_di_lam)}}"
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
                                <option value="{{$dschucVuHienTai->id}}" {{$canBo->chuc_vu_hien_tai == $dschucVuHienTai->id ? 'selected' : ''}}>{{$dschucVuHienTai->ten}}</option>
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
                                <option value="{{$dsdonVi->id}}" {{$canBo->don_vi == $dsdonVi->id ? 'selected' : ''}}>{{$dsdonVi->ten_don_vi}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Chức danh</label>
                    <input type="text" class="form-control" name="chuc_danh" value="{{$canBo->chuc_danh}}"
                           placeholder="Chức danh " required>
                </div>
            </div>
            <div class="col-md-3" >
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
                           placeholder="010021 " required>
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
                    <label for="exampleInputEmail4">Ngày hưởng <span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{formatDMY($canBo->ngay_huong)}}"
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
                           placeholder="3 " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> % hưởng</label>
                    <input type="text" class="form-control" name="phan_tram_huong" id="" value="{{$canBo->phan_tram_huong}}"
                           placeholder="100 " required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6"> % V.khung</label>
                    <input type="text" class="form-control" name="khung" id="" value="{{$canBo->phan_tram_khung}}"
                           placeholder="3 " required>
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

    <div class="form-group">
        <div class="col-md-3 col-sm">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Cập nhật</button>
        </div>
    </div>
</form>

<form  action="{{route('canBoDanhGiac3',$canBo->id)}}" method="POST" id="form-s3" >
    @csrf
    <div class="col-md-12" style="background: white">
        <div class="row">

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Xuất thân</label>
                    <div class="form-group">
                        <select class="form-control select2" name="xuat_than">
                            <option value="">--Lựa chọn--</option>
                            @foreach($xuatThan as $dsxuatThan)
                                <option value="{{$dsxuatThan->id}}"  {{$canBo->xuat_than == $dsxuatThan->id ? 'selected' : ''}}>{{$dsxuatThan->ten}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Khen thưởng cao nhất</label>
                    <div class="form-group">
                        <select class="form-control select2" name="khen_thuong_cao_nhat">
                            <option value="">--Lựa chọn--</option>
                            @foreach($khenThuong as $dschuyenNganhDT)
                                <option value="{{$dschuyenNganhDT->id}}"  {{$canBo->khen_thuong_cao_nhat == $dschuyenNganhDT->id ? 'selected' : ''}}>{{$dschuyenNganhDT->ten}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Học hàm cao nhất</label>
                    <div class="form-group">
                        <select class="form-control select2" name="hoc_ham">
                            <option value="">--Lựa chọn--</option>
                            @foreach($chuyenNganhDT as $dschuyenNganhDT)
                                <option value="{{$dschuyenNganhDT->id}}"  {{$canBo->hoc_ham == $dschuyenNganhDT->id ? 'selected' : ''}}>{{$dschuyenNganhDT->ten}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Kỷ luật cao nhất</label>
                    <div class="form-group">
                        <select class="form-control select2" name="ky_luat_cao_nhat">
                            <option value="">--Lựa chọn--</option>
                            @foreach($kyLuat as $dskyLuat)
                                <option value="{{$dskyLuat->id}}"  {{$canBo->ky_luat_cao_nhat == $dskyLuat->id ? 'selected' : ''}}>{{$dskyLuat->ten}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Phân loại cán bộ</label>
                    <div class="form-group">
                        <select class="form-control select2" name="phan_loai_cb">
                            <option value="">--Lựa chọn--</option>
                            @foreach($loaiCanBo as $dscb)
                                <option value="{{$dscb->id}}" {{$canBo->phan_loai_cb == $dscb->id ? 'selected' : ''}}>{{$dscb->ten}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4" >
                    <label for="bi_dich_bat"><input type="checkbox" value="1"  {{$canBo->bi_dich_bat == 1 ? 'checked' : ''}} id="bi_dich_bat" name="bi_dich_bat"> Bị địch bắt, tù đày hoặc làm việc cho chế độ cũ</label>
            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Đặc điểm lịch sử bản thân</label>
                    <div class="form-group">
                        <textarea class="form-control" name="dac_diem_lich_su_ban_than" id="trich-yeu" rows="3" placeholder="tù đầy ở lao bảo" required>{{$canBo->dac_diem_lich_su_ban_than}}</textarea>

                    </div>
                </div>

            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Đặc điểm lịch sử bản thân(Nhà đất,tài sản..)</label>
                    <div class="form-group">
                        <textarea class="form-control" name="dac_diem_lich_su_ban_than_tai_san" id="trich-yeu" rows="3" placeholder="Nhà Bê tông kiên cố, 2 tầng" required>{{$canBo->dac_diem_lich_su_ban_than_tai_san}}</textarea>

                    </div>
                </div>
            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Đánh giá, nhận xét cơ quan quản lý cán bộ</label>
                    <div class="form-group">
                        <textarea class="form-control" name="danh_gia_cua_can_bo" id="trich-yeu" rows="3" placeholder="hoàn thành xuất sắc nhiệm, và hoạt động đảng bộ sôi nổi" required>{{$canBo->danh_gia_cua_can_bo}}</textarea>

                    </div>
                </div>
            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Tự đánh giá, nhận xét về bản thân</label>
                    <div class="form-group">
                        <textarea class="form-control" name="tu_nhan_xet_ban_than" id="trich-yeu" rows="3" placeholder="hoàn thành xuất sắc nhiệm vụ" required>{{$canBo->tu_nhan_xet_ban_than}}</textarea>

                    </div>
                </div>
            </div>
            <div class="col-md-3 " >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày khai <span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="ngay_khai" id="ngay_khai" value="{{formatDMY($canBo->ngay_khai)}}"
                               placeholder="dd/mm/yyyy" required>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày xác nhận <span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="ngay_xac_nhan" id="ngay_xac_nhan" value="{{formatDMY($canBo->ngay_xac_nhan)}}"
                               placeholder="dd/mm/yyyy" required>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 col-sm">
            <button type="submit" form="form-s3" class="btn btn-primary"><i class="fa fa-check-square-o" ></i> Cập nhật</button>
        </div>
    </div>
</form>

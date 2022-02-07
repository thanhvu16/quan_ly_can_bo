<form class="" action="{{route('canBoDanhGia',$canBo->id)}}" method="POST" id="form2" >
    @csrf
    <div class="col-md-12" style="background: white">
        <div class="row">

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Ngành CM chính</label>
                    <select class="form-control select2" name="chuyen_nganh_id">
                        @foreach($chuyenNganhDT as $dschuyenNganhDT)
                            <option value="{{$dschuyenNganhDT->id}}"  {{$canBo->chuyen_nganh_id == $dschuyenNganhDT->id ? 'selected' : ''}}>{{$dschuyenNganhDT->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Trình độ</label>
                    <select class="form-control select2" name="trinh_do_1">
                        @foreach($congViecChuyenMon as $dscongViecChuyenMon)
                            <option value="{{$dscongViecChuyenMon->id}}"  {{$canBo->trinh_do_1 == $dscongViecChuyenMon->id ? 'selected' : ''}}>{{$dscongViecChuyenMon->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Bằng</label>
                    <select class="form-control select2" name="bang1">
                        @foreach($hinhThucDaoTao as $dshinhDT)
                            <option value="{{$dshinhDT->id}}"  {{$canBo->bang1 == $dshinhDT->id ? 'selected' : ''}}>{{$dshinhDT->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Ngành CM thứ 2</label>
                    <select class="form-control select2" name="chuyen_nganh_id_2">
                        @foreach($chuyenNganhDT as $dschuyenNganhDT)
                            <option value="{{$dschuyenNganhDT->id}}"  {{$canBo->chuyen_nganh_id_2 == $dschuyenNganhDT->id ? 'selected' : ''}}>{{$dschuyenNganhDT->ten}}</option>
                        @endforeach

                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Trình độ</label>
                    <select class="form-control select2" name="trinh_do_2">
                        @foreach($congViecChuyenMon as $dscongViecChuyenMon)
                            <option value="{{$dscongViecChuyenMon->id}}"  {{$canBo->trinh_do_2 == $dscongViecChuyenMon->id ? 'selected' : ''}}>{{$dscongViecChuyenMon->ten}}</option>
                        @endforeach


                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Bằng</label>
                    <select class="form-control select2" name="bang2">
                        @foreach($hinhThucDaoTao as $dshinhDT)
                            <option value="{{$dshinhDT->id}}"  {{$canBo->bang2 == $dshinhDT->id ? 'selected' : ''}}>{{$dshinhDT->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Trình độ phổ thông</label>
                    <select class="form-control select2" name="trinh_do_pho_thong_id">
                        @foreach($phoThong as $dsphoThong)
                            <option value="{{$dsphoThong->id}}"  {{$canBo->trinh_do_pho_thong_id == $dsphoThong->id ? 'selected' : ''}}>{{$dsphoThong->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">TĐCM cao nhất</label>
                    <select class="form-control select2" name="trinh_do_chuyen_mon_cao_nhat_id">
                        @foreach($congViecChuyenMon as $dscongViecChuyenMon)
                            <option value="{{$dscongViecChuyenMon->id}}"  {{$canBo->trinh_do_chuyen_mon_cao_nhat_id == $dscongViecChuyenMon->id ? 'selected' : ''}}>{{$dscongViecChuyenMon->ten}}</option>
                        @endforeach

                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Lý luận Chính trị</label>
                    <select class="form-control select2" name="ly_luan_chinh_tri">
                        @foreach($lyluanChinhTri as $dslyLuan)
                            <option value="{{$dslyLuan->id}}"  {{$canBo->ly_luan_chinh_tri == $dslyLuan->id ? 'selected' : ''}}>{{$dslyLuan->ten}}</option>
                        @endforeach

                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Quản lý hành chính</label>
                    <select class="form-control select2" name="quan_ly_hanh_chinh">
                        @foreach($quanLyHanhChinh as $dsHC)
                            <option value="{{$dsHC->id}}"  {{$canBo->quan_ly_hanh_chinh == $dsHC->id ? 'selected' : ''}}>{{$dsHC->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Tin Học</label>
                    <select class="form-control select2" name="tin_hoc">
                        @foreach($tinHoc as $dstinHoc)
                            <option value="{{$dstinHoc->id}}"  {{$canBo->tin_hoc == $dstinHoc->id ? 'selected' : ''}}>{{$dstinHoc->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiếng Anh</label>
                    <select class="form-control select2" name="tieng_anh">
                        @foreach($tiengAnh as $dstiengAnh)
                            <option value="{{$dstiengAnh->id}}"  {{$canBo->tieng_anh == $dstiengAnh->id ? 'selected' : ''}}>{{$dstiengAnh->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Ngôn ngữ khác</label>
                    <select class="form-control select2" name="ngon_ngu">
                        @foreach($ngoaiNgu as $dsngoaiNgu)
                            <option value="{{$dsngoaiNgu->id}}"  {{$canBo->ngon_ngu == $dsngoaiNgu->id ? 'selected' : ''}}>{{$dsngoaiNgu->ten}}</option>
                        @endforeach

                    </select>

                </div>
            </div>
{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">Trình độ:	</label>--}}
{{--                    <select class="form-control select2" name="nhom_don_vi">--}}
{{--                        @foreach($congViecChuyenMon as $dscongViecChuyenMon)--}}
{{--                            <option value="{{$dscongViecChuyenMon->id}}"  {{$canBo->chuyen_nganh_id_2 == $dscongViecChuyenMon->id ? 'selected' : ''}}>{{$dscongViecChuyenMon->ten}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}

{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-3 mt-4" >
                <div class="form-group">
                    <input type="checkbox" name="la_dang_vien"  value="1" {{$canBo->la_dang_vien == 1 ? 'checked' : ''}} >&emsp;<label for="exampleInputEmail1"> Là đảng viên	</label>
                </div>
            </div>


            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày vào đảng <span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{formatDMY($canBo->ngay_vao_dang)}}"
                               name="ngay_vao_dang" id="ngay_vao_dang"
                               placeholder="dd/mm/yyyy" required>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày vào đảng chính thức<span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"  value="{{formatDMY($canBo->ngay_vao_dang_chinh_thuc)}}"
                               name="ngay_vao_dang_chinh_thuc" id="ngay_vao_dang_chinh_thuc"
                               placeholder="dd/mm/yyyy" required>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Nơi vào đảng</label>
                    <input type="text" class="form-control" name="noi_vao_dang" value="{{$canBo->noi_vao_dang}}"
                           placeholder=" " required>

                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Chức vụ đảng cao nhất</label>
                    <select class="form-control select2" name="chuc_vu_cao_nhat">
                        @foreach($chucVuDang as $dschucVuDang)
                            <option value="{{$dschucVuDang->id}}"  {{$canBo->chuc_vu_cao_nhat == $dschucVuDang->id ? 'selected' : ''}}>{{$dschucVuDang->ten_chuc_vu}}</option>
                        @endforeach

                    </select>

                </div>
            </div>
{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">Đơn vị</label>--}}
{{--                    <select class="form-control select2" name="nhom_don_vi">--}}
{{--                        <option value="1">Văn phòng Quận ủy - Quận ủy Nam Từ Liêm</option>--}}
{{--                        <option value="1">Phật giáo</option>--}}
{{--                    </select>--}}

{{--                </div>--}}
{{--            </div>--}}

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày tham gia tổ chức(Đoàn,hội..)<span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"  value="{{formatDMY($canBo->ngay_tham_gia_to_chuc)}}"
                               name="ngay_tham_gia_to_chuc" id="ngay_tham_gia_to_chuc"
                               placeholder="dd/mm/yyyy" required>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Công việc chính</label>
                    <input type="text" class="form-control" name="cong_viec_chinh" id="cong_viec_chinh" value="{{$canBo->cong_viec_chinh}}"
                           placeholder=" Quản lý" required>

                </div>
            </div>
            <div class="col-md-3 mt-4" >
                <div class="form-group">
                    <input type="checkbox" name="da_di_bo_doi" value="1" {{$canBo->da_di_bo_doi == 1 ? 'checked' : ''}}>&emsp;<label for="exampleInputEmail1"> Đã đi bộ đội	</label>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày nhập ngũ<span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="nhap_ngu" id="nhap_ngu" value="{{formatDMY($canBo->nhap_ngu)}}"
                               placeholder="dd/mm/yyyy" required>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày xuất ngũ <span
                            style="color: red">*</span></label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="xuat_ngu" id="xuat_ngu" value="{{formatDMY($canBo->xuat_ngu)}}"
                               placeholder="dd/mm/yyyy" required>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Quân hàm cao nhất</label>
                    <select class="form-control select2" name="quan_ham_cao_nhat">
                        @foreach($quanHam as $dsQuanHam)
                            <option value="{{$dsQuanHam->id}}"  {{$canBo->quan_ham_cao_nhat == $dsQuanHam->id ? 'selected' : ''}}>{{$dsQuanHam->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Danh hiệu phong tặng cao nhất</label>
                    <select class="form-control select2" name="danh_hieu_phong_tang_cao_nhat">
                        @foreach($danhHieu as $dsDanHieu)
                            <option value="{{$dsDanHieu->id}}"  {{$canBo->danh_hieu_phong_tang_cao_nhat == $dsDanHieu->id ? 'selected' : ''}}>{{$dsDanHieu->ten}}</option>
                        @endforeach

                    </select>

                </div>
            </div>

{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail6">Sở trường công tác</label>--}}
{{--                    <input type="text" class="form-control" name="ten_khac" id=""--}}
{{--                           placeholder="Ví dụ: Quản lý" required>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Sở trường công tác</label>
                    <input type="text" class="form-control" name="so_truong_cong_tac" id=""  value="{{$canBo->so_truong_cong_tac}}"
                           placeholder="Ví dụ: Quản lý" required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Sức khỏe</label>
                    <input type="text" class="form-control" name="suc_khoe" id=""  value="{{$canBo->suc_khoe}}"
                           placeholder="Ví dụ: Tốt" required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Chiều cao</label>
                    <input type="text" class="form-control" name="chieu_cao" id="" value="{{$canBo->chieu_cao}}"
                           placeholder="Ví dụ: 170" required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Cân nặng</label>
                    <input type="text" class="form-control" name="can_nang" id="" value="{{$canBo->can_nang}}"
                           placeholder="Ví dụ: 75" required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Nhóm máu</label>
                    <select class="form-control select2" name="nhom_mau">
                        <option value="A" {{$canBo->nhom_mau == 'A' ? 'selected' : ''}}>A</option>
                        <option value="B" {{$canBo->nhom_mau == 'B' ? 'selected' : ''}}>B</option>
                        <option value="AB" {{$canBo->nhom_mau == 'AB' ? 'selected' : ''}}>AB</option>
                        <option value="O" {{$canBo->nhom_mau == 'O' ? 'selected' : ''}}>O</option>
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Thương binh hạng</label>
                    <input type="text" class="form-control" name="thuong_binh" id=""  value="{{$canBo->thuong_binh}}"
                           placeholder="Ví dụ: 01-Apr" required>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Đối tượng chính sách</label>
                    <select class="form-control select2" name="doi_tuong_chinh_sach">
                        @foreach($doiTuongQuanLy as $dsdoiTuongQuanLy)
                            <option value="{{$dsdoiTuongQuanLy->id}}"  {{$canBo->doi_tuong_chinh_sach == $dsdoiTuongQuanLy->id ? 'selected' : ''}}>{{$dsdoiTuongQuanLy->ten}}</option>
                        @endforeach

                    </select>

                </div>
            </div>




        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 col-sm">
            <button type="submit" form="form2" class="btn btn-primary"><i class="fa fa-check-square-o" ></i> Cập nhật</button>
        </div>
    </div>
</form>

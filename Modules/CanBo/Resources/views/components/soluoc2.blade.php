<form class="" action="{{route('canBoDanhGia',$canBo->id)}}" method="POST" id="form2" >
    @csrf
    <div class="col-md-12" style="background: white">
        <div class="row">


{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">Trình độ</label>--}}
{{--                    <select class="form-control select2" name="trinh_do_1">--}}
{{--                        @foreach($congViecChuyenMon as $dscongViecChuyenMon)--}}
{{--                            <option value="{{$dscongViecChuyenMon->id}}"  {{$canBo->trinh_do_1 == $dscongViecChuyenMon->id ? 'selected' : ''}}>{{$dscongViecChuyenMon->ten}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">Bằng</label>--}}
{{--                    <select class="form-control select2" name="bang1">--}}
{{--                        @foreach($hinhThucDaoTao as $dshinhDT)--}}
{{--                            <option value="{{$dshinhDT->id}}"  {{$canBo->bang1 == $dshinhDT->id ? 'selected' : ''}}>{{$dshinhDT->ten}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">Ngành CM thứ 2</label>--}}
{{--                    <select class="form-control select2" name="chuyen_nganh_id_2">--}}
{{--                        @foreach($chuyenNganhDT as $dschuyenNganhDT)--}}
{{--                            <option value="{{$dschuyenNganhDT->id}}"  {{$canBo->chuyen_nganh_id_2 == $dschuyenNganhDT->id ? 'selected' : ''}}>{{$dschuyenNganhDT->ten}}</option>--}}
{{--                        @endforeach--}}

{{--                    </select>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">Trình độ</label>--}}
{{--                    <select class="form-control select2" name="trinh_do_2">--}}
{{--                        @foreach($congViecChuyenMon as $dscongViecChuyenMon)--}}
{{--                            <option value="{{$dscongViecChuyenMon->id}}"  {{$canBo->trinh_do_2 == $dscongViecChuyenMon->id ? 'selected' : ''}}>{{$dscongViecChuyenMon->ten}}</option>--}}
{{--                        @endforeach--}}


{{--                    </select>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">Bằng</label>--}}
{{--                    <select class="form-control select2" name="bang2">--}}
{{--                        @foreach($hinhThucDaoTao as $dshinhDT)--}}
{{--                            <option value="{{$dshinhDT->id}}"  {{$canBo->bang2 == $dshinhDT->id ? 'selected' : ''}}>{{$dshinhDT->ten}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}

{{--                </div>--}}
{{--            </div>--}}
            <h4 style="color: blue;font-weight: bold">IV. Đào tạo bồi dưỡng</h4>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Trình độ phổ thông</label>
                    <select class="form-control select2" name="trinh_do_pho_thong_id">
                        <option value="">--Lựa chọn--</option>
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
                        <option value="">--Lựa chọn--</option>
                        @foreach($congViecChuyenMon as $dscongViecChuyenMon)
                            <option value="{{$dscongViecChuyenMon->id}}"  {{$canBo->trinh_do_chuyen_mon_cao_nhat_id == $dscongViecChuyenMon->id ? 'selected' : ''}}>{{$dscongViecChuyenMon->ten}}</option>
                        @endforeach

                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Ngành CM chính</label>
                    <select class="form-control select2" name="chuyen_nganh_id">
                        <option value="">--Lựa chọn--</option>
                        @foreach($chuyenNganhDT as $dschuyenNganhDT)
                            <option value="{{$dschuyenNganhDT->id}}"  {{$canBo->chuyen_nganh_id == $dschuyenNganhDT->id ? 'selected' : ''}}>{{$dschuyenNganhDT->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Năm tốt nghiệp</label>
                    <input type="text" class="form-control" name="nam_tot_nghiep" value="{{$canBo->nam_tot_nghiep}}"
                           placeholder="Năm tốt nghiệp " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Kết quả xếp loại</label>
                    <input type="text" class="form-control" name="ket_qua_xep_loai" value="{{$canBo->ket_qua_xep_loai}}"
                           placeholder="Kết quả xếp loại " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Trình độ quản lý kinh tế</label>
                    <input type="text" class="form-control" name="trinh_do_quan_ly_kinh_te" value="{{$canBo->trinh_do_quan_ly_kinh_te}}"
                           placeholder="Trình độ quản lý kinh tế " >
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Lý luận Chính trị</label>
                    <select class="form-control select2" name="ly_luan_chinh_tri">
                        <option value="">--Lựa chọn--</option>
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
                        <option value="">--Lựa chọn--</option>
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
                        <option value="">--Lựa chọn--</option>
                        @foreach($tinHoc as $dstinHoc)
                            <option value="{{$dstinHoc->id}}"  {{$canBo->tin_hoc == $dstinHoc->id ? 'selected' : ''}}>{{$dstinHoc->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Ngoại Ngữ</label>
                    <select class="form-control select2" name="tieng_anh">
                        <option value="">--Lựa chọn--</option>
                        @foreach($tiengAnh as $dstiengAnh)
                            <option value="{{$dstiengAnh->id}}"  {{$canBo->tieng_anh == $dstiengAnh->id ? 'selected' : ''}}>{{$dstiengAnh->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Tiếng dân tộc thiểu số</label>
                    <input type="text" class="form-control" name="tieng_dan_toc" value="{{$canBo->tieng_dan_toc}}"
                           placeholder="Tiếng dân tộc thiểu số " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Chức danh khoa học</label>
                    <input type="text" class="form-control" name="chuc_danh_kh" value="{{$canBo->chuc_danh_kh}}"
                           placeholder="Chức danh khoa học " >
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Năm phong chức danh khoa học</label>
                    <input type="text" class="form-control" name="nam_phong_cd_kh" value="{{$canBo->nam_phong_cd_kh}}"
                           placeholder="1998 " >
                </div>
            </div>
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
{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">Ngôn ngữ khác</label>--}}
{{--                    <select class="form-control select2" name="ngon_ngu">--}}
{{--                        @foreach($ngoaiNgu as $dsngoaiNgu)--}}
{{--                            <option value="{{$dsngoaiNgu->id}}"  {{$canBo->ngon_ngu == $dsngoaiNgu->id ? 'selected' : ''}}>{{$dsngoaiNgu->ten}}</option>--}}
{{--                        @endforeach--}}

{{--                    </select>--}}

{{--                </div>--}}
{{--            </div>--}}
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
                <div class="row clearfix"></div>
            <h4 style="color: blue;font-weight: bold">V. Thông tin khác</h4>
            <div class="col-md-3 mt-4" >
                <div class="form-group">
                    <input type="checkbox"  name="la_doan_vien" {{ isset($canBo) && $canBo->ngay_vao_doan ? 'checked' : ''}}  value="1" >&emsp;<label for="la_doan_vien"> Là đoàn viên	</label>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày vào Đoàn TNCSHCM </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{ isset($canBo) && $canBo->ngay_vao_doan ? formatDMY($canBo->ngay_vao_doan) : ''}}"
                               name="ngay_vao_doan" id="ngay_vao_doan" autocomplete="off"
                               placeholder="dd/mm/yyyy" required>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Nơi vào đoàn</label>
                    <input type="text" class="form-control" name="noi_vao_doan" value="{{$canBo->noi_vao_doan}}"
                           placeholder="Nơi vào đoàn " >

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Chức vụ Đoàn hiện nay</label>
                    <input type="text" class="form-control" name="chuc_vu_doan" value="{{$canBo->chuc_vu_doan}}"
                           placeholder="Chức vụ đoàn " >
                </div>
            </div>
            <div class="row clearfix"></div>
            <div class="col-md-3 mt-4" >
                <div class="form-group">
                    <input type="checkbox" name="la_dang_vien"  value="1" {{$canBo->la_dang_vien == 1 ? 'checked' : ''}} >&emsp;<label for="exampleInputEmail1"> Là đảng viên	</label>
                </div>
            </div>


            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày vào Đảng CSVN </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" value="{{ isset($canBo) && $canBo->ngay_vao_dang ? formatDMY($canBo->ngay_vao_dang) : ''}}"
                               name="ngay_vao_dang" id="ngay_vao_dang" autocomplete="off"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày vào đảng chính thức</label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"  value="{{ isset($canBo) && $canBo->ngay_vao_dang_chinh_thuc ? formatDMY($canBo->ngay_vao_dang_chinh_thuc) : ''}}"
                               name="ngay_vao_dang_chinh_thuc" id="ngay_vao_dang_chinh_thuc" autocomplete="off"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Nơi kết nạp</label>
                    <input type="text" class="form-control" name="noi_vao_dang" value="{{$canBo->noi_vao_dang}}"
                           placeholder=" " >

                </div>
            </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Chức vụ đảng hiện nay</label>
                    <select class="form-control select2" name="chuc_vu_dang_hien_nay">
                        <option value="">--Lựa chọn--</option>
                        @foreach($chucVuDang as $dschucVuDang)
                            <option value="{{$dschucVuDang->id}}"  {{$canBo->chuc_vu_dang_hien_nay == $dschucVuDang->id ? 'selected' : ''}}>{{$dschucVuDang->ten_chuc_vu}}</option>
                        @endforeach

                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày tham gia LLVT</label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"  value="{{ isset($canBo) && $canBo->ngay_tham_gia_to_chuc ? formatDMY($canBo->ngay_tham_gia_to_chuc) : ''}}"
                               name="ngay_tham_gia_to_chuc" id="ngay_tham_gia_to_chuc" autocomplete="off"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày giải ngũ</label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"  value="{{ isset($canBo) && $canBo->ngay_giai_ngu ? formatDMY($canBo->ngay_giai_ngu) : ''}}"
                               name="ngay_giai_ngu" id="ngay_giai_ngu" autocomplete="off"
                               placeholder="dd/mm/yyyy" >
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
                        <option value="">--Lựa chọn--</option>
                        @foreach($quanHam as $dsQuanHam)
                            <option value="{{$dsQuanHam->id}}"  {{$canBo->quan_ham_cao_nhat == $dsQuanHam->id ? 'selected' : ''}}>{{$dsQuanHam->ten}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Chức vụ đảng cao nhất</label>
                    <select class="form-control select2" name="chuc_vu_cao_nhat">
                        <option value="">--Lựa chọn--</option>
                        @foreach($chucVuDang as $dschucVuDang)
                            <option value="{{$dschucVuDang->id}}"  {{$canBo->chuc_vu_cao_nhat == $dschucVuDang->id ? 'selected' : ''}}>{{$dschucVuDang->ten_chuc_vu}}</option>
                        @endforeach

                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Danh hiệu NN phong tặng</label>
                    <select class="form-control select2" name="danh_hieu_phong_tang_cao_nhat">
                        <option value="">--Lựa chọn--</option>
                        @foreach($danhHieu as $dsDanHieu)
                            <option value="{{$dsDanHieu->id}}"  {{$canBo->danh_hieu_phong_tang_cao_nhat == $dsDanHieu->id ? 'selected' : ''}}>{{$dsDanHieu->ten}}</option>
                        @endforeach

                    </select>

                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Năm phong tặng</label>
                    <input type="text" class="form-control" name="nam_phong_tang_nn_pt" id=""  value="{{$canBo->nam_phong_tang_nn_pt}}"
                           placeholder="Ví dụ: 1992́" required>
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
                    <input type="number" class="form-control" name="thuong_binh" id=""  value="{{$canBo->thuong_binh}}"
                           placeholder="Ví dụ: 1" required>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Bệnh binh</label>
                    <input type="number" class="form-control" name="benh_binh" id=""  value="{{$canBo->benh_binh}}"
                           placeholder="Ví dụ: 40" required>
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
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Năng lực sở trường </label>
                    <select class="form-control select2" name="so_truong_cong_tac">
                        <option value="">--Lựa chọn--</option>
                        <option value="Lãnh đạo, chỉ huy">Lãnh đạo, chỉ huy </option>
                        <option value="Tổ chức triển khai thực hiện">Tổ chức triển khai thực hiện</option>
                        <option value="Phân tích, tổng hợp">Phân tích, tổng hợp  </option>
                        <option value="Tuyên truyền, vận động">Tuyên truyền, vận động</option>
                        <option value="Nghiên cứu chính sách ">Nghiên cứu chính sách </option>
                        <option value="Thanh tra, kiểm tra">Thanh tra, kiểm tra  </option>
                        <option value="Phát minh, sáng kiến trong chuyên môn ">Phát minh, sáng kiến trong chuyên môn</option>
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
                    <label for="exampleInputEmail1">Công việc chính</label>
                    <input type="text" class="form-control" name="cong_viec_chinh" id="cong_viec_chinh" value="{{$canBo->cong_viec_chinh}}"
                           placeholder=" Quản lý" required>

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


            <div class="row clearfix"></div>
            <div class="col-md-3 mt-4" >
                <div class="form-group">
                    <input type="checkbox" name="da_di_bo_doi" value="1" {{$canBo->da_di_bo_doi == 1 ? 'checked' : ''}}>&emsp;<label for="exampleInputEmail1"> Đã đi bộ đội	</label>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày nhập ngũ</label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker"
                               name="nhap_ngu" id="nhap_ngu" value="{{ isset($canBo) && $canBo->nhap_ngu ? formatDMY($canBo->nhap_ngu) : ''}}"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="exampleInputEmail4">Ngày xuất ngũ </label>
                    <div class="input-group date">
                        <input type="text" class="form-control  datepicker" autocomplete="off"
                               name="xuat_ngu" id="xuat_ngu" value="{{ isset($canBo) && $canBo->xuat_ngu ? formatDMY($canBo->xuat_ngu) : ''}}"
                               placeholder="dd/mm/yyyy" >
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div>




{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail6">Sở trường công tác</label>--}}
{{--                    <input type="text" class="form-control" name="ten_khac" id=""--}}
{{--                           placeholder="Ví dụ: Quản lý" required>--}}
{{--                </div>--}}
{{--            </div>--}}







        </div>
    </div>
    @can(\App\Common\AllPermission::suaCanBo())
        <div class="form-group">
            <div class="col-md-3 col-sm">
                <button type="submit" form="form2" class="btn btn-primary"><i class="fa fa-check-square-o" ></i> Cập nhật</button>
            </div>
        </div>
    @endcan
</form>

<div class="modal fade" id="myModal12">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('quaTrinhDaoTao',$canBo->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i
                            class="fa fa-refresh"></i> Cập nhật quá trình đào tạo</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 " >
                            <div class="form-group">
                                <label for="exampleInputEmail4">Từ ngày <span
                                        style="color: red">*</span></label>
                                <div class="input-group date">
                                    <input type="text" class="form-control  datepicker"
                                           name="tu_ngay" id="tu_ngay" value=""
                                           placeholder="dd/mm/yyyy" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail4">Đến ngày <span
                                        style="color: red">*</span></label>
                                <div class="input-group date">
                                    <input type="text" class="form-control  datepicker"
                                           name="den_ngay" id="den_ngay" value=""
                                           placeholder="dd/mm/yyyy" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Loại hình kiến thức <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <select class="form-control select2" name="loai_dao_tao" required>
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($chuyenNganhDT as $dschuyenNganhDT)
                                            <option value="{{$dschuyenNganhDT->id}}"  >{{$dschuyenNganhDT->ten}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Tên chuyên ngành ĐT - BD <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ten_chuyen_nganh" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Hình thức <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <select class="form-control select2" name="hinh_thuc" required>
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($hinhThucDaoTao as $dsdt)
                                            <option value="{{$dsdt->id}}" >{{$dsdt->ten}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Trường đào tạo <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <select class="form-control select2" name="truong" required>
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($truongHoc as $dstruong)
                                            <option value="{{$dstruong->id}}"  >{{$dstruong->ten}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Nước đào tạo <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nuoc_dao_tao" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Trình độ tốt nghiệp <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <select class="form-control select2" name="trinh_do" required>
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($congViecChuyenMon as $dscongViecChuyenMon)
                                            <option value="{{$dscongViecChuyenMon->id}}"  >{{$dscongViecChuyenMon->ten}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Loại văn bằng, chứng chỉ <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="chung_chi" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Nguồn kinh phí <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="kinh_phi" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>


                        <div class="form-group col-md-4 mt-4" >
                            <button class="btn btn-primary"><i class="fa fa-check-square-o"></i> Cập nhật</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </form>
        </div>
    </div>
</div>

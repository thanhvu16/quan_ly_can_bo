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

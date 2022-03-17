<form  action="{{route('canBoDanhGiac3',$canBo->id)}}" method="POST" id="form-s3" >
    @csrf
    <div class="col-md-12" style="background: white">
        <div class="row">


            <h4 style="color: blue;font-weight: bold">Đặc điểm lịch sử bản thân</h4>
{{--            <div class="col-md-6 mt-4" >--}}
{{--                    <label for="bi_dich_bat"><input type="checkbox" value="1"  {{$canBo->bi_dich_bat == 1 ? 'checked' : ''}} id="bi_dich_bat" name="bi_dich_bat"> Bị địch bắt, tù đày hoặc làm việc cho chế độ cũ</label>--}}
{{--            </div>--}}
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Khai rõ: bị bắt, bị tù (từ ngày tháng năm nào đến ngày tháng năm nào, ở đâu), đã khai báo cho ai, những vấn đề gì? Bản thân có làm việc trong chế độ cũ (cơ quan, đơn vị nào, địa điểm, chức danh, chức vụ, thời gian làm việc….)</label>
                    <div class="form-group">
                        <textarea class="form-control" name="dac_diem_lich_su_ban_than" id="trich-yeu" rows="3" placeholder="Khai rõ: bị bắt, bị tù (từ ngày tháng năm nào đến ngày tháng năm nào, ở đâu), đã khai báo cho ai, những vấn đề gì? Bản thân có làm việc trong chế độ cũ (cơ quan, đơn vị nào, địa điểm, chức danh, chức vụ, thời gian làm việc….)" required>{{$canBo->dac_diem_lich_su_ban_than}}</textarea>

                    </div>
                </div>

            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Tham gia hoặc có quan hệ với các tổ chức chính trị, kinh tế, xã hội nào ở nước ngoài (thời gian, làm gì, tổ chức nào, đặt trụ sở ở đâu……?)</label>
                    <div class="form-group">
                        <textarea class="form-control" name="dac_diem_lich_su_ban_than_tai_san" id="trich-yeu" rows="3" placeholder="Tham gia hoặc có quan hệ với các tổ chức chính trị, kinh tế, xã hội nào ở nước ngoài (thời gian, làm gì, tổ chức nào, đặt trụ sở ở đâu……?) " required>{{$canBo->dac_diem_lich_su_ban_than_tai_san}}</textarea>

                    </div>
                </div>
            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="exampleInputEmail6">Có thân nhân (Cha, Mẹ, Vợ, Chồng, con, anh chị em ruột) ở nước ngoài (thời gian, làm gì, địa chỉ….)?</label>
                    <div class="form-group">
                        <textarea class="form-control" name="nhan_than_nuoc_ngoai"  rows="3" placeholder=" (Cha, Mẹ, Vợ, Chồng, con, anh chị em ruột) ở nước ngoài (thời gian, làm gì, địa chỉ….)? " required>{{$canBo->nhan_than_nuoc_ngoai}}</textarea>

                    </div>
                </div>
            </div>
{{--            <div class="col-md-12" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail6">Đánh giá, nhận xét cơ quan quản lý cán bộ</label>--}}
{{--                    <div class="form-group">--}}
{{--                        <textarea class="form-control" name="danh_gia_cua_can_bo" id="trich-yeu" rows="3" placeholder="hoàn thành xuất sắc nhiệm, và hoạt động đảng bộ sôi nổi" required>{{$canBo->danh_gia_cua_can_bo}}</textarea>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-12" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail6">Tự đánh giá, nhận xét về bản thân</label>--}}
{{--                    <div class="form-group">--}}
{{--                        <textarea class="form-control" name="tu_nhan_xet_ban_than" id="trich-yeu" rows="3" placeholder="hoàn thành xuất sắc nhiệm vụ" required>{{$canBo->tu_nhan_xet_ban_than}}</textarea>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3 " >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail4">Ngày khai <span--}}
{{--                            style="color: red">*</span></label>--}}
{{--                    <div class="input-group date">--}}
{{--                        <input type="text" class="form-control  datepicker"--}}
{{--                               name="ngay_khai" id="ngay_khai" value="{{ isset($canBo) && $canBo->ngay_khai ? formatDMY($canBo->ngay_khai) : ''}}"--}}
{{--                               placeholder="dd/mm/yyyy" required>--}}
{{--                        <div class="input-group-addon">--}}
{{--                            <i class="fa fa-calendar-o"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3" >--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail4">Ngày xác nhận <span--}}
{{--                            style="color: red">*</span></label>--}}
{{--                    <div class="input-group date">--}}
{{--                        <input type="text" class="form-control  datepicker"--}}
{{--                               name="ngay_xac_nhan" id="ngay_xac_nhan" value="{{ isset($canBo) && $canBo->ngay_xac_nhan ? formatDMY($canBo->ngay_xac_nhan) : ''}}"--}}
{{--                               placeholder="dd/mm/yyyy" required>--}}
{{--                        <div class="input-group-addon">--}}
{{--                            <i class="fa fa-calendar-o"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}





        </div>
    </div>
    @can(\App\Common\AllPermission::suaCanBo())
        <div class="form-group">
            <div class="col-md-3 col-sm">
                <button type="submit" form="form-s3" class="btn btn-primary"><i class="fa fa-check-square-o" ></i> Cập nhật</button>
            </div>
        </div>
    @endcan
</form>

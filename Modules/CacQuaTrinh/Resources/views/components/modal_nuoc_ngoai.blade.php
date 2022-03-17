<div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('quaTrinhNuocNgoai',$canBo->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i
                            class="fa fa-refresh"></i> Cập nhật quá trình nước ngoài</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 " >
                            <input type="hidden" name="cap_nhat_qua_trinh" value="1">
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
{{--                        <div class="col-md-3" >--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail6">Nơi đến</label>--}}
{{--                                <div class="form-group">--}}
{{--                                    <select class="form-control select2" name="noi_dao_tao" required>--}}
{{--                                        <option value="">--Lựa chọn--</option>--}}
{{--                                        <option value="Trong nước">Trong nước</option>--}}
{{--                                        <option value="Nước ngoài">Nước ngoài</option>--}}
{{--                                        <option value="Các nước tư bản">Các nước tư bản</option>--}}
{{--                                        <option value="Các nước khác">Các nước khác</option>--}}
{{--                                    </select>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Tên nước <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ten_nuoc" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Lý do <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ly_do" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Cơ quan quyết định<span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cong_viec" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Nguồn kinh phí<span
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

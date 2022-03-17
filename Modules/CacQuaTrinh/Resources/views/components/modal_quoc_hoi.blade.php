<div class="modal fade" id="myModal15">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('quaTrinhQuocHoi',$canBo->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i
                            class="fa fa-refresh"></i> Cập nhật quá trình</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 " >
                            <div class="form-group">
                                <input type="hidden" name="cap_nhat_qua_trinh" value="1">
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
                        <div class="col-md-3 " >
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
                                <label for="exampleInputEmail6">Loại hình đại biểu<span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="loai_hinh_dai_bieu" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Nhiệm kỳ <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nhiem_ky" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Thông tin chi tiết <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="thong_tin" value=""
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

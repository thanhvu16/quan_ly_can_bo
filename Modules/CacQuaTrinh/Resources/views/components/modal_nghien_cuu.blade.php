<div class="modal fade" id="myModal19">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('quaTrinhNghienCuu',$canBo->id ) }}" method="POST" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail4">Thời gian tham gia <span
                                        style="color: red">*</span></label>
                                <div class="input-group date">
                                    <input type="hidden" name="cap_nhat_qua_trinh" value="1">
                                    <input type="text" class="form-control  datepicker"
                                           name="thoi_gian" id="thoi_gian" value=""
                                           placeholder="dd/mm/yyyy" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Tên đề tài <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ten_de_tai" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Cấp đề tài <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cap_de_tai" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Chủ nhiệm đề tài <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="chu_nhiem" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Tư cách tham gia <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tu_cach_tham_gia" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Kết quả đánh giá <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ket_qua" value=""
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

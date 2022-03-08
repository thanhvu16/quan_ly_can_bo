<div class="modal fade" id="myModal7">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('quaTrinhCanBo',$canBo->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i
                            class="fa fa-refresh"></i> Cập nhật quá trình </h4>
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
                                <label for="exampleInputEmail6">Chức vụ Đoàn thể <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="chuc_vu" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Cơ quan, đơn vị công tác <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="co_quan" value=""
                                           placeholder=" " required>

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4 " >
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

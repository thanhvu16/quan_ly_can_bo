<div class="modal fade" id="myModal10">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('quaTrinhKhenKy',$canBo->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i
                            class="fa fa-refresh"></i> Cập nhật quá trình công tác</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Số quyết định<span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="so_quyet_dinh" value=""
                                           placeholder="Số quyết định " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail4">Ngày quyết định <span
                                        style="color: red">*</span></label>
                                <div class="input-group date">
                                    <input type="text" class="form-control  datepicker"
                                           name="ngay_quyet_dinh" id="ngay_quyet_dinh" value=""
                                           placeholder="dd/mm/yyyy" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Hình thức <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="noi_dung" value=""
                                           placeholder="Nội dung " required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Cơ quan khen thưởng <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="co_quan" value="" placeholder="Cơ quan khen thưởng " required>
                                    <input type="hidden" class="form-control" name="type" value="2" placeholder=" " >

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Lý do <span
                                        style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ly_do" value=""
                                           placeholder="Lý do " required>

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

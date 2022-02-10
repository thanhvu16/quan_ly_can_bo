<div class="modal fade" id="myModal14">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('quaTrinhDiChuyen',$canBo->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i
                            class="fa fa-refresh"></i> Cập nhật quá di chuyển</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 " >
                            <div class="form-group">
                                <label for="exampleInputEmail4">Ngày chuyển <span
                                        style="color: red">*</span></label>
                                <div class="input-group date">
                                    <input type="text" class="form-control  datepicker" autocomplete="off"
                                           name="ngay_chuyen" id="ngay_chuyen" value=""
                                           placeholder="dd/mm/yyyy" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail4">Ngày quyết định <span style="color: red">*</span></label>
                                <div class="input-group date">
                                    <input type="text" class="form-control  datepicker" autocomplete="off"
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
                                <label for="exampleInputEmail6">Hình thức di chuyển <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <select class="form-control select2" name="trang_thai" required>
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($trangThai as $dstt)
                                            <option value="{{$dstt->id}}" >{{$dstt->ten}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6"> Đơn vị chuyển đến <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="don_vi_chuyen_den" id="" value=""
                                       placeholder=" " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6"> Số quyết định <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="so_quyet_dinh" id="" value=""
                                       placeholder=" " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6"> Cơ quan quyết định <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="co_quan" id="" value=""
                                       placeholder=" " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6"> Người ký <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="nguoi_ky" id="" value=""
                                       placeholder=" " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6"> File</label>
                                <input type="file" class="form-control" name="file[]" id="" value=""
                                       placeholder=" " >
                            </div>
                        </div>
                        <div class="form-group col-md-3 mt-4" >
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

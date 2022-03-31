<div class="modal fade" id="myModal18">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('quaTrinhQuyHoachCanBo',$canBo->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i
                            class="fa fa-refresh"></i> Cập nhật quá trình </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Chức vụ </label>
                                <div class="form-group">
                                    <select class="form-control select2" name="chuc_vu">
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($chucVuHienTai as $dschucVuHienTai)
                                            <option value="{{$dschucVuHienTai->id}}" >{{$dschucVuHienTai->ten}}</option>
                                        @endforeach

                                    </select>
                                    <input type="hidden" name="cap_nhat_qua_trinh" value="1">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 " >
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

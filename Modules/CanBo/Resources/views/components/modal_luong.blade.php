<div class="modal fade" id="myModal4">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('quaTrinhluong',$canBo->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i
                            class="fa fa-refresh"></i> Cập nhật quá trình lương</h4>
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
                                <label for="exampleInputEmail6">Ngạch công chức</label>
                                <div class="form-group">
                                    <select class="form-control select2" name="ngach_cong_chuc" required>
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($ngach as $dsngach)
                                            <option value="{{$dsngach->id}}" {{$canBo->ngach_cong_chuc == $dsngach->id ? 'selected' : ''}}>{{$dsngach->ten}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Bậc lương</label>
                                <div class="form-group">
                                    <select class="form-control select2" name="bac_luong">
                                        @foreach($bacLuong as $dsbacLuong)
                                            <option value="{{$dsbacLuong->id}}" >{{$dsbacLuong->bac_luong}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Hệ số lương</label>
                                <div class="form-group">
                                    <select class="form-control select2" name="he_so_luong">
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($bacLuong as $dsbacLuong)
                                            <option value="{{$dsbacLuong->id}}" >{{$dsbacLuong->he_so_luong}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6">Phụ cấp </label>
                                <div class="form-group">
                                    <select class="form-control select2" name="phu_cap">
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($phuCap as $dsphuCap)
                                            <option value="{{$dsphuCap->id}}" {>{{$dsphuCap->ten}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6"> % hưởng</label>
                                <input type="text" class="form-control" name="phan_tram_huong" id="" value=""
                                       placeholder="100 " required>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label for="exampleInputEmail6"> Tổng lương</label>
                                <input type="text" class="form-control" name="tong_luong" id="" value=""
                                       placeholder="100 " required>
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

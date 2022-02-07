<div class="box box-primary">
    <form  action="{{route('canBoDanhGiatt',$canBo->id)}}" method="POST" id="form3">
        @csrf
        <div class="box-body box-profile">
            <a onclick="showModal()" style="cursor: pointer">
                            <span style="color: white;font-size: 14px"><i class="fa fa-folder-open-o"></i>
                                <img class="profile-user-img img-responsive img-circle" src="{{asset('logobo.jpg')}}" alt="User profile picture">
                            </span></a>

            <h3 class="profile-username text-center">{{$canBo->ho_ten}}</h3>

            <p class="text-muted text-center">Phó chủ tịch</p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Đơn vị chủ quản</b> <a class="pull-right">QUẬN ỦY NAM TỪ LIÊM</a>
                </li>
                <li class="list-group-item">
                    <b>Đơn vị quản lý</b> <a class="pull-right">BAN TỔ CHỨC QUẬN ỦY</a>
                </li>
                <li class="list-group-item">
                    <b>Số thẻ Đảng</b> <a class="pull-right">29 123456</a>
                </li>
                <li class="list-group-item">
                    <b>Hình thức tuyển</b>
                    <a class="pull-right">
                        <select name="hinh_thuc_tuyen" id="" style="text-align: center">
                            @foreach($hinhThucTuyen as $dshinhThucTuyen)
                                <option value="{{$dshinhThucTuyen->id}}"  {{$canBo->hinh_thuc_tuyen == $dshinhThucTuyen->id ? 'selected' : ''}}>{{$dshinhThucTuyen->ten}}</option>
                            @endforeach
                        </select>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Trạng thái</b>
                    <a class="pull-right">
                        <select name="trang_thai_cb" id="" style="text-align: center">
                            @foreach($trangThai as $dstrangThai)
                                <option value="{{$dstrangThai->id}}"  {{$canBo->trang_thai_cb == $dstrangThai->id ? 'selected' : ''}}>{{$dstrangThai->ten}}</option>
                            @endforeach
                        </select>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Trung ương quản lý	</b> <a class="pull-right"><input  {{$canBo->trung_uong_quan_ly == 1 ? 'checked' : ''}} type="checkbox" value="1" name="trung_uong_quan_ly"></a>
                </li>
                <li class="list-group-item">
                    <b>Làm công tác quản lý</b> <a class="pull-right"><input {{$canBo->lam_cong_tac_quan_ly == 1 ? 'checked' : ''}} type="checkbox" value="1" name="lam_cong_tac_quan_ly"></a>
                </li>
            </ul>

            <button  class="btn btn-primary btn-block"><b><i class="fa fa-check-square-o"></i> Cập nhật</b></button>
        </div>

    </form>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<!-- About Me Box -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Thông tin thêm</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i> Trình độ:</strong> &emsp;{{$canBo->hinhThucTuyen->ten ?? ''}}
        <hr>
        <strong><i class="fa fa-map-marker margin-r-5"></i>Quê quán:</strong>&emsp;{{$canBo->queQuan->ten ?? ''}}
        <hr>

        <strong><i class="fa fa-pencil margin-r-5"></i> Kỹ năng</strong>

        <p>
            ( đang cập nhật..)
        </p>

        <hr>

        <strong><i class="fa fa-file-text-o margin-r-5"></i> Khen thưởng</strong><br>

        <i>( Chưa có khen thưởng nào được cập nhật ).</i>
    </div>
    <!-- /.box-body -->
</div>

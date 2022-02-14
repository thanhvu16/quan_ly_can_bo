<div class="box box-primary">
    <form  action="{{route('canBoDanhGiatt',$canBo->id)}}" method="POST" id="form3">
        @csrf
        <div class="box-body box-profile">
            <a onclick="showModal()" style="cursor: pointer">
                            <span style="color: white;font-size: 14px"><i class="fa fa-folder-open-o"></i>
                                <img class="profile-user-img img-responsive img-circle" src="{{asset('logobo.jpg')}}" alt="User profile picture">
                            </span></a>

            <h3 class="profile-username text-center">{{$canBo->ho_ten}}</h3>

            <p class="text-muted text-center">{{ $canBo->chu_danh }}</p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Đơn vị chủ quản</b> <a class="pull-right">{{ $canBo->donVi->ten_don_vi }}</a>
                </li>
                <li class="list-group-item">
                    <b>Đơn vị quản lý</b> <a class="pull-right">{{ $donViChuQuan->ten_don_vi ?? ''}}</a>
                </li>
                <li class="list-group-item">
                    <b>Số thẻ Đảng</b> <a class="pull-right">{{ $canBo->so_the_dang }}</a>
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
            @can(\App\Common\AllPermission::suaCanBo())
                <button  class="btn btn-primary btn-block"><b><i class="fa fa-check-square-o"></i> Cập nhật</b></button>
            @endcan
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
        <hr>

        <strong><i class="fa fa-files-o margin-r-5"></i> Phiếu cán bộ công chức, viên chức</strong><br>
        <p>- <i class="fa fa-file-word-o" style="color: #205ad4"></i> <a href="{{ asset('uploads/phieu-can-bo/'.$canBo->id.'_phieu_can_bo.docx') }}">phiếu cán bộ.docx</a></p>
{{--        <p>- <i class="fa fa-file-pdf-o" style="color: red;"></i> <a href="">phiếu cán bộ.pdf</a></p>--}}
    </div>
    <!-- /.box-body -->
</div>

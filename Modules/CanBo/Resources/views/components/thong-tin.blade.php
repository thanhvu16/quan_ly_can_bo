<div class="box box-primary">
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
                    <select name="" id="" style="text-align: center">
                        <option value="">Thi tuyển</option>
                        <option value="">Hợp đồng 3 năm</option>
                    </select>
                </a>
            </li>
            <li class="list-group-item">
                <b>Trạng thái</b>
                <a class="pull-right">
                    <select name="" id="" style="text-align: center">
                        <option value="">Hiện đang có mặt</option>
                        <option value="">Điều động đến</option>
                    </select>
                </a>
            </li>
            <li class="list-group-item">
                <b>Trung ương quản lý	</b> <a class="pull-right"><input type="checkbox"></a>
            </li>
            <li class="list-group-item">
                <b>Làm công tác quản lý</b> <a class="pull-right"><input type="checkbox"></a>
            </li>
        </ul>

        <a href="#" class="btn btn-primary btn-block"><b><i class="fa fa-check-square-o"></i> Cập nhật</b></a>
    </div>
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
        <strong><i class="fa fa-book margin-r-5"></i> Trình độ:</strong> &emsp;Đại học
        <hr>
        <strong><i class="fa fa-map-marker margin-r-5"></i>Quê quán:</strong>&emsp;Hà Nội
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

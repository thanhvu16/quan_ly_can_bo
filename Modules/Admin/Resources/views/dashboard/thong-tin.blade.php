<div class="col-md-6 col-sm-12">
    <div class="panel panel-info">
        <div class="panel-heading col-md-12 pl-1" style="background:#3c8dbc;color:white;font-weight: bold" >
            <div class="col-md-7">
                <i class="fa fa-hourglass-3"></i>
                <span>&ensp;Thống kê vị trí tuyển dụng</span>
            </div>
            <div class="col-md-5 text-center panel-bieu-do">
                <span class="text-center">Biểu đồ</span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel-body">
            <div class="col-md-7 pl-1">
                <a class="text-title-item" href="{{ route('allCanBo', 'vi_tri=1') }}">
                    <p>Tổng số hồ sơ công chức
                        <button
                            class="btn br-10 btn-primary btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoCongChuc }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'vi_tri=2') }}">
                    <p>Tổng số hồ sơ viên chức
                        <button
                            class="btn br-10 btn-warning btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoVienChuc }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'vi_tri=3') }}">
                    <p>Tổng số hồ sơ nhân viên
                        <button
                            class="btn br-10 btn-purple btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoNhanVien }}</button>
                    </p>
                </a>
            </div>
            <div class="col-md-5 ">
                <div id="pie-chart-thong-ke-tuyen-dung">

                </div>
            </div>
        </div>
    </div>
</div>

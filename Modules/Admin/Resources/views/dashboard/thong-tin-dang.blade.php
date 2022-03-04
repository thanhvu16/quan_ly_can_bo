<div class="col-md-6 col-sm-12">
    <div class="panel panel-info">
        <div class="panel-heading col-md-12 pl-1" style="background:#3c8dbc;color:white;font-weight: bold" >
            <div class="col-md-7">
                <i class="fa fa-hourglass-3"></i>
                <span>&ensp;Thống kê công tác Đoàn, Đảng</span>
            </div>
            <div class="col-md-5 text-center panel-bieu-do">
                <span class="text-center">Biểu đồ</span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel-body">
            <div class="col-md-7 pl-1">
                <a class="text-title-item" href="{{ route('allCanBo', 'dang_vienC=1') }}">
                    <p>Tổng số hồ sơ là đảng viên
                        <button
                            class="btn br-10 btn-success btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoDangVien }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'doan_vien=1') }}">
                    <p>Tổng số hồ sơ là đoàn viên
                        <button
                            class="btn br-10 btn-primary btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoDoanVien }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'bo_doi=1') }}">
                    <p>Tổng số hồ sơ đã đi bộ đội
                        <button
                            class="btn br-10 btn-warning btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoDiBoDoi }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'giai_ngu=1') }}">
                    <p>Tổng số hồ sơ đã giải ngũ
                        <button
                            class="btn br-10 btn-purple btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoGiaiNgu }}</button>
                    </p>
                </a>

            </div>
            <div class="col-md-5 ">
                <div id="pie-chart-thong-ke-dang">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-sm-12">
    <div class="panel panel-info">
        <div class="panel-heading col-md-12 pl-1" style="background:#3c8dbc;color:white;font-weight: bold" >
            <div class="col-md-7">
                <i class="fa fa-hourglass-3"></i>
                <span>&ensp;Thống kê cán bộ trong đơn vị</span>
            </div>
            <div class="col-md-5 text-center panel-bieu-do">
                <span class="text-center">Biểu đồ</span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel-body">
            <div class="col-md-7 pl-1">
                <a class="text-title-item" href="{{ route('allCanBo') }}">
                    <p>Tổng số hồ sơ cán bộ
                        <button
                            class="btn br-10 btn-success btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongCanBoTrongDonVi }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'gioi_tinh=1') }}">
                    <p>Tổng số hồ sơ nam
                        <button
                            class="btn br-10 btn-primary btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoNamTrongDonVi }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'gioi_tinh=2') }}">
                    <p>Tổng số hồ sơ nữ
                        <button
                            class="btn br-10 btn-warning btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoNuTrongDonVi }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'thong_ke=1&ve_huu=1') }}">
                    <p>Tổng số hồ sơ về hưu
                        <button
                            class="btn br-10 btn-purple btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoHoSoVeHuu }}</button>
                    </p>
                </a>
            </div>
            <div class="col-md-5 ">
                <div id="pie-chart-thong-ke-can-bo">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-sm-12">
    <div class="panel panel-info">
        <div class="panel-heading col-md-12 pl-1" style="background:#3c8dbc;color:white;font-weight: bold" >
            <div class="col-md-7">
                <i class="fa fa-hourglass-3"></i>
                <span>&ensp;Cảnh báo hệ thống</span>
            </div>
            <div class="col-md-5 text-center panel-bieu-do">
                <span class="text-center">Biểu đồ</span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel-body">
            <div class="col-md-7 pl-1">
                <a class="text-title-item" href="{{ route('allCanBo', 'sap_nhan_ve_huu=1') }}">
                    <p>Cán bộ sắp nhận quyết định về hưu
                        <button
                            class="btn br-10 btn-success btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $canBoSapNhanQDVeHuu }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'sap_nang_luong=1') }}">
                    <p>Cán bộ sắp được nâng lương
                        <button
                            class="btn br-10 btn-primary btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $canBoSapNangLuong }}</button>
                    </p>
                </a>
{{--                <a class="text-title-item" href="{{ route('allCanBo', 'bo_nhiem=1') }}">--}}
{{--                    <p>Cán bộ được bổ nhiệm--}}
{{--                        <button--}}
{{--                            class="btn br-10 btn-warning btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $CanBoBoNhiem }}</button>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <a class="text-title-item" href="{{ route('allCanBo', 'bo_nhiem_lai=1') }}">--}}
{{--                    <p>Cán bộ được bổ nhiệm lại--}}
{{--                        <button--}}
{{--                            class="btn br-10 btn-purple btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $CanBoBoNhiemLai }}</button>--}}
{{--                    </p>--}}
{{--                </a>--}}
                <a class="text-title-item" href="{{ route('allCanBo', 'sinh_nhat=1') }}">
                    <p>Cán bộ sinh nhật hôm nay
                        <button
                            class="btn br-10 btn-pinterest btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $canBoSinhNhat }}</button>
                    </p>
                </a>

            </div>
            <div class="col-md-5 ">
                <div id="pie-chart-thong-ke-canh-bao">

                </div>
            </div>
        </div>
    </div>
</div>

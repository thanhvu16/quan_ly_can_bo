<div class="col-md-6 col-sm-12">
    <div class="panel panel-info">
        <div class="panel-heading col-md-12 pl-1" style="background:#3c8dbc;color:white;font-weight: bold" >
                <div class="col-md-7">
                    <i class="fa fa-hourglass-3"></i>
                    <span>&ensp;Hồ sơ cán bộ chờ xử lý</span>
                </div>
                <div class="col-md-5 text-center panel-bieu-do">
                    <span class="text-center">Biểu đồ</span>
                </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel-body">
                <div class="col-md-7 pl-1">
                    @if (auth::user()->hasRole(CAN_BO))
                        <a href="{{route('ho_so_can_bo.create')}}" class="text-title-item">
                            <p>Nhập hồ sơ cán bộ</p>
                        </a>
                    @endif
                    <a href="{{ route('allCanBo') }}" class="text-title-item">
                        <p>Danh sách hồ sơ cán bộ</p>
                    </a>
                    @if (auth::user()->hasRole(LANH_DAO))
                        <a class="text-title-item" href="{{ route('ho_so_can_bo.lanh_dao_cho_duyet') }}">
                            <p>Hồ sơ cán bộ chờ duyệt
                                <button
                                    class="btn br-10 btn-warning btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $hoSocanBoChoGuiDuyet }}</button>
                        </a>
                            <a class="text-title-item" href="{{ route('ho_so_can_bo.lanh_dao_tra_lai') }}">
                                <p>Hồ sơ đã gửi trả lại
                                    <button
                                        class="btn br-10 btn-pinterest btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $hoSoGuiDuyetBiTraLai }}</button>
                            </a>
                    @endif
                    @if (auth::user()->hasRole(CAN_BO))
                        <a class="text-title-item" href="{{route('ho_so_can_bo.cho_gui_duyet')}}">
                            <p>Hồ sơ cán bộ chờ gửi duyệt
                                <button
                                    class="btn br-10 btn-warning btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $hoSocanBoChoGuiDuyet }}</button>
                            </p>
                        </a>

                        <a class="text-title-item"  href="{{route('ho_so_can_bo.gui_duyet_bi_tra_lai')}}">
                            <p>Hồ sơ gửi duyệt bị trả lại
                                <button
                                    class="btn br-10 btn-pinterest btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $hoSoGuiDuyetBiTraLai }}</button>
                            </p>
                        </a>
                    @endif

                </div>
                <div class="col-md-5 ">
                    <div id="pie-chart-can-bo">

                    </div>
                </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-sm-12">
    <div class="panel panel-info">
        <div class="panel-heading col-md-12 pl-1" style="background:#3c8dbc;color:white;font-weight: bold" >
            <div class="col-md-7">
                <i class="fa fa-hourglass-3"></i>
                <span>&ensp;Công việc đơn vị</span>
            </div>
            <div class="col-md-5 text-center panel-bieu-do">
                <span class="text-center">Biểu đồ</span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel-body">
            <div class="col-md-7 pl-1">
                <a class="text-title-item" href="{{ route('allCanBo', 'cho_duyet=1') }}">
                    <p>Hồ sơ cán bộ chờ duyệt
                        <button
                            class="btn br-10 btn-success btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tonghoSoChoDuyet }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'da_duyet=1') }}">
                    <p>Hồ sơ cán bộ đã duyệt
                        <button
                            class="btn br-10 btn-primary btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoDaDuyet }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'tra_lai=1') }}">
                    <p>Hồ sơ cán bộ bị trả lại
                        <button
                            class="btn br-10 btn-warning btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoBiTraLai }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'gui_duyet=1') }}">
                    <p>Hồ sơ cán bộ chờ gửi duyệt
                        <button
                            class="btn br-10 btn-purple btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $tongSoChoGuiDuyet }}</button>
                    </p>
                </a>

            </div>
            <div class="col-md-5 ">
                <div id="pie-chart-quan-ly-don-vi">

                </div>
            </div>
        </div>
    </div>
</div>

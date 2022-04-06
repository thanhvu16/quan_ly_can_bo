<div class="col-md-6 col-sm-12">
    <div class="panel panel-info">
        <div class="panel-heading col-md-12 pl-1" style="background:#3c8dbc;color:white;font-weight: bold" >
            <div class="col-md-7">
                <i class="fa fa-hourglass-3"></i>
                <span>&ensp;Thống kê trình độ chuyên môn</span>
            </div>
            <div class="col-md-5 text-center panel-bieu-do">
                <span class="text-center">Biểu đồ</span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel-body">
            <div class="col-md-7 pl-1">
                <a class="text-title-item" href="{{ route('allCanBo', 'tren_dai_hoc='.$trenDaiHocID->id) }}">
                    <p>Trên đại học
                        <button
                            class="btn br-10 btn-success btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $trenDaiHoc }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'dai_hoc='.$daiHocID->id) }}">
                    <p>Đại học
                        <button
                            class="btn br-10 btn-primary btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $daiHoc }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'cao_dang='.$caoDangID->id) }}">
                    <p>Cao đẳng
                        <button
                            class="btn br-10 btn-warning btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $caoDang }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', '&trung_cap='.$trungCapID->id) }}">
                    <p>Trung cấp
                        <button
                            class="btn br-10 btn-purple btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $trungCap }}</button>
                    </p>
                </a>
                <a class="text-title-item" href="{{ route('allCanBo', 'so_cap='.$soCapID->id) }}">
                    <p>Sơ cấp, chuyên ngành
                        <button
                            class="btn br-10 btn-pinterest btn-circle waves-effect waves-light btn-sm pull-right count-item">{{  $soCap }}</button>
                    </p>
                </a>

            </div>
            <div class="col-md-5 ">
                <div id="pie-chart-thong-ke-chuyen-mon">

                </div>
            </div>
        </div>
    </div>
</div>

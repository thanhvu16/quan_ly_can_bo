@extends('admin::layouts.master')
@section('page_title', 'Quản lý hồ sơ cán bộ')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 mb-1">
                <div class="col-md-10"></div>
                <div class="col-md-2 ">
                    <form action="">
                        <select class="form-control select2" name="don_vi_loc" onchange="this.form.submit()">
                            <option value="">--Lọc theo đơn vị nhỏ hơn--</option>
                            @foreach($donVi as $dsDV)
                                <option value="{{$dsDV->id}}" {{Request::get('don_vi_loc') == $dsDV->id ? 'selected' : ''}} >{{$dsDV->ten_don_vi}}</option>
                            @endforeach

                        </select>
                    </form>
                </div>
            </div>
            <div class="col-md-12 ">
                @include('admin::dashboard.canh_bao')
                @if (!auth::user()->hasRole([QUAN_TRI_HT]))
                    @include('admin::dashboard.can_bo')
                @endif
                @if (auth::user()->hasRole([QUAN_TRI_HT]))
                    @include('admin::dashboard.quan-ly-don-vi')
                @endif
                    @include('admin::dashboard.don_vi')
                    @include('admin::dashboard.thong-tin')
                    @include('admin::dashboard.thong-tin-dang')
                    @include('admin::dashboard.trinh_do_chuyen_mon')
                <div class="row clearfix"></div>
                    @include('admin::dashboard.doi_tuong')
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        if (document.getElementById('pie-chart-can-bo') != undefined) {
            google.charts.setOnLoadCallback(drawChartQuanLyHoSoCanBo);
        }
        google.charts.setOnLoadCallback(drawChartThongKeCanBoTrongDonVi);
        google.charts.setOnLoadCallback(drawChartThongKeViTriCanBoTrongDonVi);
        google.charts.setOnLoadCallback(drawChartThongKeDangCanBoTrongDonVi);
        google.charts.setOnLoadCallback(drawChartQuanLyCanBoTrongDonVi);
        google.charts.setOnLoadCallback(drawChartThongKeChuyenMon);
        google.charts.setOnLoadCallback(drawChartCanhBao);

        function drawChartQuanLyHoSoCanBo() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($hoSoCanBoPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($hoSoCanBoCoLors); ?>
            };

            if (document.getElementById('pie-chart-can-bo') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-can-bo'));
                chart.draw(data, options);
            }
        };

        function drawChartThongKeCanBoTrongDonVi() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($thongKeCanBoPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($thongKeCanBoCoLors); ?>
            };

            if (document.getElementById('pie-chart-thong-ke-can-bo-gioi_tinh') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-thong-ke-can-bo-gioi_tinh'));
                chart.draw(data, options);
            }
        };

        function drawChartThongKeViTriCanBoTrongDonVi() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($viTriPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($viTriCoLors); ?>
            };

            if (document.getElementById('pie-chart-thong-ke-tuyen-dung') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-thong-ke-tuyen-dung'));
                chart.draw(data, options);
            }
        };
        function drawChartThongKeDangCanBoTrongDonVi() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($thongKeDangPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($thongKeDangCoLors); ?>
            };

            if (document.getElementById('pie-chart-thong-ke-dang') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-thong-ke-dang'));
                chart.draw(data, options);
            }
        };
        function drawChartQuanLyCanBoTrongDonVi() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($quanLyPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($quanLyCoLors); ?>
            };

            if (document.getElementById('pie-chart-quan-ly-don-vi') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-quan-ly-don-vi'));
                chart.draw(data, options);
            }
        };
        function drawChartThongKeChuyenMon() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($chuyenMonPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($chuyenMonCoLors); ?>
            };

            if (document.getElementById('pie-chart-thong-ke-chuyen-mon') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-thong-ke-chuyen-mon'));
                chart.draw(data, options);
            }
        };
        function drawChartCanhBao() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($canhBaoPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($CanhBaoCoLors); ?>
            };

            if (document.getElementById('pie-chart-thong-ke-canh-bao') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-thong-ke-canh-bao'));
                chart.draw(data, options);
            }
        };


    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)

            var data = google.visualization.arrayToDataTable(<?php echo json_encode($doiTuongPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            var options = {
                title : 'Đối tượng quản lý',
                vAxis: {title: 'Số lượng người'},
                hAxis: {title: 'Biểu đồ thống kê đối tượng quản lý'},
                seriesType: 'bars',
                series: {5: {type: 'line'}}
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

@endsection

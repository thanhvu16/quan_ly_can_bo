@extends('admin::layouts.master')
@section('page_title', 'Quản lý hồ sơ cán bộ')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 mt-2">
                @if (!auth::user()->hasRole([QUAN_TRI_HT]))
                    @include('admin::dashboard.can_bo')
                @endif
                @if (auth::user()->hasRole([QUAN_TRI_HT]))
                    @include('admin::dashboard.quan-ly-don-vi')
                @endif
                    @include('admin::dashboard.don_vi')
                    @include('admin::dashboard.thong-tin')
                    @include('admin::dashboard.thong-tin-dang')
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

    </script>
@endsection

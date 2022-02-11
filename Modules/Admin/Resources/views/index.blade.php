@extends('admin::layouts.master')
@section('page_title', 'Sở TNMT')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 mt-2">
                @include('admin::dashboard.can_bo')
{{--                @include('admin::dashboard.don_vi')--}}
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChartVanChoPhanLoai);

        function drawChartVanChoPhanLoai() {

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

    </script>
@endsection

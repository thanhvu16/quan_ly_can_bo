<form class="" >
    <div class="col-md-12" style="background: white">
        <div class="row">
            <div class="col-md-12">
                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình kiêm nhiệm biệt phái</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal8()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width="20%"  style="vertical-align: middle"class="text-center">Kiêm nhiệm biệt phái</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Lý do</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhKiemNhiemBietphai as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->kiemNhiem->ten ?? ''   }}</td>
                            <td>{{$data1->ly_do   }}</td>
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px">
                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình Biên chế hợp đồng</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal9()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px">
                <table class="table table-bordered table-striped dataTable mb-0">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Kiêm nhiệm biệt phái</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhBienCheHopDong as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->loaiCanBo->ten ?? ''   }}</td>
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>


    </div>


</form>
@include('canbo::components.modal_bien_che')
@include('canbo::components.modal_kiem_nhiem')

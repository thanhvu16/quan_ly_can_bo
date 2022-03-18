<form class="" >
    <div class="col-md-12" style="background: white;font-size: 12px">
        <div class="row">
            <div class="col-md-12">
                <h4 style="color: #0a0a0a;font-weight: bold">Diễn biến phụ cấp thâm niên vượt khung</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal16()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width="20%"  style="vertical-align: middle"class="text-center">Phần trăm được hưởng</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhVuotKhung as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->phan_tram ?? ''   }}</td>
                            <td>{{$data1->thanh_tien   }}</td>
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h4 style="color: #0a0a0a;font-weight: bold">Diễn biến phụ cấp khác</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal17()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width="20%"  style="vertical-align: middle"class="text-center">Loại phụ cấp</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Mức hưởng</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Thành tiền</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Cách tính phụ cấp</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhPhuCapKhac as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->loai_phu_cap ?? ''   }}</td>
                            <td>{{$data1->muc_huong   }}</td>
                            <td>{{$data1->thanh_tien   }}</td>
                            <td>{{$data1->cach_tinh   }}</td>
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
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
            <div class="col-md-12" style="margin-bottom: 10px">
                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình di chuyển</h4>
                <a style="cursor: pointer" onclick="showModal14()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
            </div>
            <div class="col-md-12" style="margin-bottom: 30px">
                <table class="table table-bordered table-striped dataTable mb-0">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Ngày chuyển</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Ngày quyết định</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Số quyết định</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Đơn vị chuyển đến</th>
                        <th width="15%"  style="vertical-align: middle"class="text-center">Cơ quan quyết định</th>
                        <th width="20%"  style="vertical-align: middle"class="text-center">Người ký</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhChuyenDonVi as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->ngay_chuyen)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->ngay_quyet_dinh)}}</td>
                            <td  class="text-left">  {{$data1->so_quyet_dinh}}</td>
                            <td  class="text-left">  {{$data1->don_vi_chuyen_den ?? ''}}</td>
                            <td  class="text-left">  {{$data1->co_quan}}</td>
                            <td  class="text-left">  {{$data1->nguoi_ky}}</td>
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
@include('canbo::components.modal_qua_trinh_di_chuyen')
@include('canbo::components.modal_phu_cap_vk')
@include('canbo::components.modal_phu_cap_khac')

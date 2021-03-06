<form class="" >
    <div class="col-md-12" style="background: white;font-size: 12px">
        <div class="row">
            <div class="col-md-12">
                <h4 style="color: #119bea;font-weight: bold">Quá trình đào tạo (Đào tạo, Bồi dưỡng nghiệp vụ,Chính trị,Tin học..)</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal12()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width="15%"  style="vertical-align: middle"class="text-center">Loại đào tạo</th>
                        <th width="15%"  style="vertical-align: middle"class="text-center">Tên chuyên ngành</th>
                        <th width="10%" style="vertical-align: middle" class="text-center">Trình độ </th>
                        <th width="10%" style="vertical-align: middle" class="text-center">Hình thức</th>
                        <th width="10%" style="vertical-align: middle" class="text-center">Nước đào tạo</th>
                        <th width="" style="vertical-align: middle" class="text-center">Trường</th>
                        <th width="" style="vertical-align: middle" class="text-center">Chứng chỉ</th>
                        <th width="" style="vertical-align: middle" class="text-center">Kinh phí</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhDaoTao as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->loaiDaoTao->ten ?? ''   }}</td>
                            <td>{{$data1->ten_chuyen_nganh ?? ''   }}</td>
                            <td>{{$data1->trinhDo->ten ?? ''   }}</td>
                            <td>{{$data1->hinhThuc->ten ?? ''   }}</td>
                            <td>{{$data1->nuoc_dao_tao   }}</td>
                            <td>{{$data1->truongHoc->ten ?? ''   }}</td>
                            <td>{{$data1->chung_chi ?? ''   }}</td>
                            <td>{{$data1->kinh_phi ?? ''   }}</td>
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px">
                <h4 style="color: #119bea;font-weight: bold">Lịch sử bản thân và Quá trình công tác</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal3()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Chức danh</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Cơ quan</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhCongTac as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold">{{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold"> {{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->chuc_danh}}</td>
                            <td>{{$data1->co_quan}}</td>
                        </tr>

                    @empty
                        <td colspan="4" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px" >
                <h4 style="color: #119bea;font-weight: bold">Quá trình hoạt động tại nước ngoài</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal2()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Nơi đến</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Lý do</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Công việc</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhNuocNgoai as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold">{{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold"> {{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->noi_den}}</td>
                            <td>{{$data1->ly_do}}</td>
                            <td>{{$data1->cong_viec}}</td>
                        </tr>

                    @empty
                        <td colspan="6" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>


    </div>


</form>
@include('canbo::components.modal_dao_tao')
@include('canbo::components.modal_cong_tac')
@include('canbo::components.modal_nuoc_ngoai')

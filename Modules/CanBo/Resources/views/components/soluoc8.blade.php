<form class="" >
    <div class="col-md-12" style="background: white;font-size: 12px">
        <div class="row">
            <div class="col-md-12">
                <h4 style="color: #0a0a0a;font-weight: bold">Đề tài nghiên cứu khoa học</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal19()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Thời gian</th>
                        <th width="" style="vertical-align: middle" class="text-center">Tên đề tài</th>
                        <th width="13%"  style="vertical-align: middle"class="text-center">Cấp đề tài</th>
                        <th width="13%"  style="vertical-align: middle"class="text-center">Chủ nhiệm đề tài</th>
                        <th width="13%"  style="vertical-align: middle"class="text-center">Tư cách tham gia</th>
                        <th width="13%"  style="vertical-align: middle"class="text-center">Kết quả đánh giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhNghienCuu as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->thoi_gian)}}</td>
                            <td class="text-center">{{$data1->ten_de_tai?? ''   }}</td>
                            <td class="text-center">{{$data1->cap_de_tai?? ''   }}</td>
                            <td class="text-center">{{$data1->chu_nhiem?? ''   }}</td>
                            <td class="text-center">{{$data1->tu_cach_tham_gia?? ''   }}</td>
                            <td class="text-center">{{$data1->ket_qua?? ''   }}</td>
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>

                </table>
            </div>
            <div class="col-md-12">
                <h4 style="color: #0a0a0a;font-weight: bold">Quan hệ gia đình</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal18()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="8%" style="vertical-align: middle" class="text-center">Quan hệ</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Họ và tên </th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Năm sinh</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Nghề nghiệp</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Nơi làm việc</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Nơi ở hiện nay</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhGiaDinh as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td class="text-center">{{$data1->quan_he ?? ''   }}</td>
                            <td class="text-center">{{$data1->ho_ten ?? ''   }}</td>
                            <td class="text-center">{{$data1->nam_sinh ?? ''   }}</td>
                            <td class="text-center">{{$data1->nghe_nghiep ?? ''   }}</td>
                            <td class="text-center">{{$data1->noi_lam_viec ?? ''   }}</td>
                            <td class="text-center">{{$data1->noi_o ?? ''   }}</td>
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h4 style="color: #0a0a0a;font-weight: bold">Bảo hiểm xã hội</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal12()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày </th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Thành phố tham gia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhBaoHiem as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->tu_ngay)}}</td>
                            <td  style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->den_ngay)}}</td>
                            <td class="text-center">{{$data1->thanhPho->ten ?? ''   }}</td>
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px">
                <h4 style="color: #0a0a0a;font-weight: bold">Thông tin về hưu</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal13()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="" style="vertical-align: middle" class="text-center">Ngày về hưu</th>
                        <th width="" style="vertical-align: middle" class="text-center">Tuổi Đảng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhVeHuu as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td  class="text-center">  {{formatDMY($data1->ngay_ve_huu)}}</td>
                            <td class="text-center">{{$data1->tuoi_dang ?? ''   }}</td>
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
@include('canbo::components.modal_bao_hiem')
@include('canbo::components.modal_ve_huu')
@include('canbo::components.modal_gia_dinh')
@include('canbo::components.modal_nghien_cuu')
@include('canbo::components.modal_ve_huu')

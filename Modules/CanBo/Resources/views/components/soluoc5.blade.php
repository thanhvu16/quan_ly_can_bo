<form class="" >
    <div class="col-md-12" style="background: white;font-size: 12px">
        <div class="row">
            <div class="col-md-12">
                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình lương</h4>

                <a style="cursor: pointer" onclick="showModal4()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px" >
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width="20%"  style="vertical-align: middle"class="text-center">Ngạch công chức</th>
                        <th width="10%" style="vertical-align: middle" class="text-center">Bậc </th>
                        <th width="10%" style="vertical-align: middle" class="text-center">Hệ số</th>
                        <th width="10%" style="vertical-align: middle" class="text-center">Phụ cấp</th>
                        <th width="5%" style="vertical-align: middle" class="text-center">%</th>
                        <th width="" style="vertical-align: middle" class="text-center">Tổng lương</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhLuong as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->ngachCongChuc->ten ?? ''   }}</td>
                            <td class="text-center">{{$data1->BacLuong->bac ?? ''   }}</td>
                            <td class="text-center">{{$data1->HeSo->he_so_luong ?? ''   }}</td>
                            <td>{{$data1->phuCap->ten ?? ''   }}</td>
                            <td class="text-center">{{$data1->phan_tram ?? ''   }}</td>
                            <td class="text-center">{{$data1->tong_luong   }}đ</td>
{{--                            <td class="text-center">{{number_format($data1->tong_luong) ?? ''   }}đ</td>--}}
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình tham gia đại biểu QH và HĐND các cấp</h4>

                <a style="cursor: pointer" onclick="showModal15()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width="20%"  style="vertical-align: middle"class="text-center">Loại hình đại biểu</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Nhiệm kỳ </th>
                        <th width="" style="vertical-align: middle" class="text-center">Thông tin chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhQuocHoi as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">  {{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->loai_hinh_dai_bieu ?? ''   }}</td>
                            <td class="text-center">{{$data1->nhiem_ky ?? ''   }}</td>
                            <td class="text-left">{{$data1->thong_tin ?? ''   }}</td>
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px">
                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình chức vụ</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal5()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width="" style="vertical-align: middle" class="text-center">Cơ quan</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Chức vụ</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Hệ số phụ cấp</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Hình thức bổ nhiệm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhChucVu as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center">{{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">{{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->co_quan}}</td>
                            <td>{{$data1->chuc_vu ?? ''}}</td>
                            <td>{{$data1->he_so_phu_cap}}</td>
                            <td>{{$data1->hinh_thuc_bo_nhiem}}</td>
                        </tr>

                    @empty
                        <td colspan="4" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px" >
                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình chức vụ Đảng</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal6()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12"  style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Cơ quan</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Chức vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhChucVuDang as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center">{{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">{{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->co_quan}}</td>
                            <td>{{$data1->chuc_vu ?? ''}}</td>
                        </tr>

                    @empty
                        <td colspan="6" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px" >
                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình đảm nhiệm các chức vụ Đoàn thể</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal7()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <td width="5%" class="text-center">STT </td>
                        <th width="13%" style="vertical-align: middle" class="text-center">Từ ngày</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Đến ngày</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Cơ quan</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Chức vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhDoan as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center">{{formatDMY($data1->tu_ngay)}}</td>
                            <td style="color: red;font-weight: bold" class="text-center">{{formatDMY($data1->den_ngay)}}</td>
                            <td>{{$data1->chuc_vu ?? ''}}</td>
                            <td>{{$data1->co_quan ?? ''}}</td>
                        </tr>

                    @empty
                        <td colspan="6" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>

            </div>
            <div class="col-md-12 mt-4" style="margin-bottom: 10px" >
                <h4 style="color: #0a0a0a;font-weight: bold">Quá trình quy hoạch cán bộ</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal18()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                    <thead>
                    <tr>
                        <td width="5%" class="text-center">STT </td>
                        <th width="13%" style="vertical-align: middle" class="text-center">Ngày quyết định</th>
                        <th width=""  style="vertical-align: middle"class="text-center">Chức vụ quy hoạch</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhQuyHoachCanBo as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center">{{formatDMY($data1->ngay_quyet_dinh)}}</td>
                            <td>{{$data1->chucVu->ten ?? ''}}</td>
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
@include('canbo::components.modal_luong')
@include('canbo::components.modal_chuc_vu')
@include('canbo::components.modal_chuc_vu_dang')
@include('canbo::components.modal_qua_trinh_can_bo')
@include('canbo::components.modal_quoc_hoi')
@include('canbo::components.modal_qua_trinh_quy_hoach_can_bo')

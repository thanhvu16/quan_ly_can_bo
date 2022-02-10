<form class="" >
    <div class="col-md-12" style="background: white">
        <div class="row">
            <div class="col-md-12">
                <h4 style="color: #0a0a0a;font-weight: bold">Bảo hiểm xã hội</h4>
                @can(\App\Common\AllPermission::suaCanBo())
                    <a style="cursor: pointer" onclick="showModal12()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
                @endcan
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0">
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
                <table class="table table-bordered table-striped dataTable mb-0">
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

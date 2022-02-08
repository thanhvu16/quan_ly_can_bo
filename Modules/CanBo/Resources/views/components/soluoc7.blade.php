<form class="" >
    <div class="col-md-12" style="background: white">
        <div class="row">
            <div class="col-md-12">
                <h4 style="color: #0a0a0a;font-weight: bold">Khen Thưởng</h4>

                <a style="cursor: pointer" onclick="showModal10()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;margin-top: 10px">
                <table class="table table-bordered table-striped dataTable mb-0">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Số quyết định</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Ngày quyết định</th>
                        <th width="20%"  style="vertical-align: middle"class="text-center">Nội dung</th>
                        <th width="" style="vertical-align: middle" class="text-center">Cơ quan khen thưởng </th>
                        <th width="20%" style="vertical-align: middle" class="text-center">Lý do</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhKhenThuong as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{$data1->so_quyet_dinh}}</td>
                            <td  class="text-center">  {{formatDMY($data1->ngay_quyet_dinh)}}</td>
                            <td>{{$data1->noi_dung ?? ''   }}</td>
                            <td class="text-center">{{$data1->co_quan ?? ''   }}</td>
                            <td class="text-center">{{$data1->ly_do ?? ''   }}</td>
                        </tr>

                    @empty
                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px">
                <h4 style="color: #0a0a0a;font-weight: bold"> Kỷ luật</h4>
                <a style="cursor: pointer" onclick="showModal11()"><i class="fa fa-plus-square" style="color: red"></i> Cập nhật quá trình</a>
            </div>
            <div class="col-md-12" style="margin-bottom: 30px">
                <table class="table table-bordered table-striped dataTable mb-0">
                    <thead>
                    <tr>
                        <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Số quyết định</th>
                        <th width="13%" style="vertical-align: middle" class="text-center">Ngày quyết định</th>
                        <th width="20%"  style="vertical-align: middle"class="text-center">Nội dung</th>
                        <th width="" style="vertical-align: middle" class="text-center">Cơ quan kỷ luật </th>
                        <th width="20%" style="vertical-align: middle" class="text-center">Lý do</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quaTrinhKyLuat as $key=>$data1)
                        <tr >
                            <td class="text-center">{{$key+1}} </td>
                            <td style="color: red;font-weight: bold" class="text-center"> {{$data1->so_quyet_dinh}}</td>
                            <td  class="text-center">  {{formatDMY($data1->ngay_quyet_dinh)}}</td>
                            <td>{{$data1->noi_dung ?? ''   }}</td>
                            <td class="text-center">{{$data1->co_quan ?? ''   }}</td>
                            <td class="text-center">{{$data1->ly_do ?? ''   }}</td>
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
@include('canbo::components.modal_khen_thuong')
@include('canbo::components.modal_ky_luat')

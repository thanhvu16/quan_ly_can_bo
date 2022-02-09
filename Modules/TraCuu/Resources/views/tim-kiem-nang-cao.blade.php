@extends('admin::layouts.master')
@section('page_title', 'Danh sách cán bộ')
@section('content')
    <section class="content" style="font-size: 14px">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <div class="row">
                                <h3 class="box-title">Tìm kiếm nâng cao</h3>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            {{--                            <i>(STT mà đỏ: <span style="color: red">văn bản đang xử lý</span>; STT màu xanh: <span style="color: blue">Văn bản chưa được phân</span>; STT màu đen: <span style="color: black">Văn bản đã hoàn thành</span>)</i>--}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="col-md-12 mt-1 ">
                        <div class="row">
                            <div class="col-md-6">
                                <a class=" btn btn-primary" data-toggle="collapse"
                                   href="#collapseExample"
                                   aria-expanded="false" aria-controls="collapseExample"> <i class="fa  fa-search"></i> <span
                                        style="font-size: 14px"></span>
                                </a>
                            </div>
                            <div class="col-md-6 text-right">
                                    <form  method="GET" action="{{ route('nangCao') }}" class="form-export">
                                        <input type="hidden" name="type"  value="">
                                        <input type="hidden" name="ten_cb"  value="{{Request::get('ten_cb') }}">
                                        <input type="hidden" name="gioi_tinh"  value="{{Request::get('gioi_tinh') }}">
                                        <input type="hidden" name="cmt" value="{{Request::get('cmt') }}">
                                        <input type="hidden" name="the_dang" value="{{Request::get('the_dang') }}">
                                        <input type="hidden" name="start_date"  value="{{Request::get('start_date') }}">
                                        <input type="hidden" name="chuc_vu_dang" value="{{Request::get('chuc_vu_dang') }}">
                                        <input type="hidden" name="trinh_do_chuyen_mon"  value="{{Request::get('trinh_do_chuyen_mon') }}">
                                        <input type="hidden" name="ton_giao" value="{{Request::get('ton_giao') }}">
                                        <input type="hidden" name="don_vi_id"  value="{{Request::get('don_vi_id') }}">
                                        <input type="hidden" name="phong_ban_id" value="{{Request::get('phong_ban_id') }}">
                                        <input type="hidden" name="tinh_trang"  value="{{Request::get('tinh_trang') }}">
                                        <input type="hidden" name="chuc_vu_chinh"  value="{{Request::get('chuc_vu_chinh') }}">
                                        <input type="hidden" name="kiem_nhiem"  value="{{Request::get('kiem_nhiem') }}">
                                        <input type="hidden" name="loai_dao_tao" value="{{Request::get('loai_dao_tao') }}">
                                        <input type="hidden" name="phan_loai" value="{{Request::get('phan_loai') }}">
                                        <input type="hidden" name="hinh_thuc" value="{{Request::get('hinh_thuc') }}">
                                        <input type="hidden" name="bac_luong" value="{{Request::get('bac_luong') }}">
                                        <input type="hidden" name="he_so_luong" value="{{Request::get('he_so_luong') }}">
                                        <input type="hidden" name="phu_cap" value="{{Request::get('phu_cap') }}">
                                        <input type="hidden" name="page" value="{{Request::get('page') }}">

                                        <button type="button" data-type="excel"
                                                class="btn btn-success waves-effect waves-light btn-sm btn-export-data"><i
                                                class="fa fa-file-excel-o"></i> Xuất Excel
                                        </button>
                                    </form>
                            </div>

                            {{--                            @can('in sổ văn bản đơn vị')--}}
                            {{--                           --}}
                            {{--                            <div class="col-md-6 text-right">--}}
                            {{--                                <a role="button" href="{{route('in-so-tra-cuu.index')}}"  class="btn btn-success ">--}}
                            {{--                                    <span style="color: white;font-size: 14px"><i class="fa  fa-print"></i> In sổ</span></a>--}}
                            {{--                            </div>--}}
                            {{--                                @endcan--}}
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="row">

                            <div class="col-md-12 collapse in }} " id="collapseExample">
                                <form action="{{route('nangCao')}}" id="tim_kiem" method="get" >
                                    <div class="row">
                                        <div class="form-group col-md-3" >
                                            <label for="loai_van_ban_id" class="col-form-label">Tên cán bộ</label>
                                            <input type="text" name="ten_cb" value="{{Request::get('ten_cb')}}" class="form-control" placeholder="Nhập tên cán bộ..">
                                        </div>

                                        <div class="form-group col-md-3" >
                                            <label for="loai_van_ban_id" class="col-form-label">Giới tính</label>
                                            <select class="form-control select2" name="gioi_tinh" id="gioi-tinh">
                                                <option value="" >--Lựa chọn--</option>
                                                <option value="1" {{Request::get('gioi_tinh') == 1 ? 'selected' : ''}}>--Nam--</option>
                                                <option value="2" {{Request::get('gioi_tinh') == 2 ? 'selected' : ''}}>--Nữ--</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-3" >
                                            <label for="loai_van_ban_id" class="col-form-label">Chứng minh thư</label>
                                            <input type="text" name="cmt" value="{{Request::get('cmt')}}" class="form-control" placeholder="Nhập chứng minh thư..">
                                        </div>
                                        <div class="form-group col-md-3" >
                                            <label for="loai_van_ban_id" class="col-form-label">Mã thẻ Đảng</label>
                                            <input type="text" name="the_dang" class="form-control" value="{{Request::get('the_dang')}}" placeholder="Nhập mã thẻ đảng..">
                                        </div>
                                        <div class="row clearfix"></div>



                                        <div class="form-group col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail4">Ngày vào đảng chính thức</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control  datepicker"
                                                           name="start_date" id="start_date" value="{{Request::get('start_date')}}"
                                                           placeholder="dd/mm/yyyy" >
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar-o"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3" >
                                            <label for="loai_van_ban_id" class="col-form-label">Chức vụ Đảng</label>
                                            <select class="form-control select2" name="chuc_vu_dang" id="chuc_vu_dang">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($chucVuDang as $dschucVuDang)
                                                    <option value="{{$dschucVuDang->id}}"  {{Request::get('chuc_vu_dang') == $dschucVuDang->id ? 'selected' : ''}}>{{$dschucVuDang->ten_chuc_vu}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Trình độ chuyên môn</label>
                                            <select class="form-control  select2"
                                                    name="trinh_do_chuyen_mon" id="trinh_do_chuyen_mon">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($congViecChuyenMon as $dscongViecChuyenMon)
                                                    <option value="{{$dscongViecChuyenMon->id}}"  {{Request::get('trinh_do_chuyen_mon') == $dscongViecChuyenMon->id ? 'selected' : ''}}>{{$dscongViecChuyenMon->ten}}</option>
                                                @endforeach

                                            </select>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Tôn giáo</label>
                                            <select class="form-control  select2"
                                                    name="ton_giao" id="ton_giao">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($tonGiao as $dsTonGiao)
                                                    <option value="{{$dsTonGiao->id}}" {{Request::get('ton_giao') == $dsTonGiao->id ? 'selected' : ''}}>{{$dsTonGiao->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row clearfix"></div>
                                        <div class="col-md-3 form-group">
                                            <label for="exampleInputEmail1">Tìm theo đơn vị</label>
                                            <select name="don_vi_id" id="don-vi" class="form-control select-don-vi-id select2">
                                                <option value="">-- Tất cả --</option>
                                                @if (count($danhSachDonVi) > 0)
                                                    @foreach($danhSachDonVi as $donVi)
                                                        <option value="{{ $donVi->id }}" {{ Request::get('don_vi_id') == $donVi->id ? 'selected' : '' }}>{{ $donVi->ten_don_vi }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3 show-phong-ban {{ isset($danhSachPhongBan) && count($danhSachPhongBan) > 0 ? 'show' : 'hide' }}">

                                            <label class="col-form-label" for="phong-ban">Phòng ban</label>
                                            <select class="form-control select2 select-phong-ban" name="phong_ban_id">
                                                <option value="">-- Chọn phòng ban --</option>
                                                @if (isset($danhSachPhongBan) && count($danhSachPhongBan) > 0)
                                                    @foreach($danhSachPhongBan as $donVi)
                                                        <option value="{{ $donVi->id }}" {{ Request::get('phong_ban_id') == $donVi->id ? 'selected' : '' }}>{{ $donVi->ten_don_vi }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Tình trạng</label>
                                            <select class="form-control  select2"
                                                    name="tinh_trang" id="tinh_trang">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($trangThai as $dstrangThai)
                                                    <option value="{{$dstrangThai->id}}"  {{Request::get('tinh_trang') == $dstrangThai->id ? 'selected' : ''}}>{{$dstrangThai->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Chức vụ chính quyền</label>
                                            <select class="form-control  select2"
                                                    name="chuc_vu_chinh" id="chuc_vu_chinh">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($chucVuHienTai as $hientai)
                                                    <option value="{{$hientai->id}}"  {{Request::get('chuc_vu_chinh') == $hientai->id ? 'selected' : ''}}>{{$hientai->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Kiêm nhiệm biệt phái</label>
                                            <select class="form-control  select2"
                                                    name="kiem_nhiem" id="kiem_nhiem">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($kiemNhiemBietPhai as $kiemnhiem)
                                                    <option value="{{$kiemnhiem->id}}"  {{Request::get('kiem_nhiem') == $kiemnhiem->id ? 'selected' : ''}}>{{$kiemnhiem->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Phân loại cán bộ</label>
                                            <select class="form-control  select2"
                                                    name="phan_loai" id="phan_loai">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($hopDongBienChe as $hd)
                                                    <option value="{{$hd->id}}"  {{Request::get('phan_loai') == $hd->id ? 'selected' : ''}}>{{$hd->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Loại đào tạo</label>
                                            <select class="form-control  select2"
                                                    name="loai_dao_tao" id="loai_dao_tao">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($chuyenNganhDT as $dschuyenNganhDT)
                                                    <option value="{{$dschuyenNganhDT->id}}"  {{Request::get('loai_dao_tao') == $dschuyenNganhDT->id ? 'selected' : ''}} >{{$dschuyenNganhDT->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3" >
                                            <div class="form-group">
                                                <label for="exampleInputEmail6">Hình thức</label>
                                                <div class="form-group">
                                                    <select class="form-control select2" name="hinh_thuc" >
                                                        <option value="">--Lựa chọn--</option>
                                                        @foreach($hinhThucDaoTao as $dsdt)
                                                            <option value="{{$dsdt->id}}" {{Request::get('hinh_thuc') == $dsdt->id ? 'selected' : ''}}>{{$dsdt->ten}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" >
                                            <div class="form-group">
                                                <label for="exampleInputEmail6">Bậc lương</label>
                                                <div class="form-group">
                                                    <select class="form-control select2" name="bac_luong">
                                                        <option value="">--Lựa chọn--</option>
                                                        @foreach($bacLuong as $dsbacLuong)
                                                            <option value="{{$dsbacLuong->id}}"  {{Request::get('bac_luong') == $dsbacLuong->id ? 'selected' : ''}}>{{$dsbacLuong->bac_luong}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" >
                                            <div class="form-group">
                                                <label for="exampleInputEmail6">Hệ số lương</label>
                                                <div class="form-group">
                                                    <select class="form-control select2" name="he_so_luong">
                                                        <option value="">--Lựa chọn--</option>
                                                        @foreach($bacLuong as $dsbacLuong)
                                                            <option value="{{$dsbacLuong->id}}" {{Request::get('he_so_luong') == $dsbacLuong->id ? 'selected' : ''}}>{{$dsbacLuong->he_so_luong}}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" >
                                            <div class="form-group">
                                                <label for="exampleInputEmail6">Phụ cấp cv</label>
                                                <div class="form-group">
                                                    <select class="form-control select2" name="phu_cap">
                                                        <option value="">--Lựa chọn--</option>
                                                        @foreach($phuCap as $dsphuCap)
                                                            <option value="{{$dsphuCap->id}}" >{{$dsphuCap->ten}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mt-4">
                                            <button class="btn btn-primary" type="submit"> <i class="fa fa-search"></i> Tìm kiếm</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body" style=" width: 100%;overflow-x: auto;">
                        Tổng số cán bộ: <b style="font-size: 16px">{{ $danhSach->total() }}</b>
                        <table class="table table-bordered table-striped dataTable mb-0">
                            <thead>
                            <tr>
                                <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                                <th width="" style="vertical-align: middle" class="text-center">Họ tên</th>
                                <th width="5%" style="vertical-align: middle" class="text-center">Giới tính</th>
                                <th width="7%"  style="vertical-align: middle"class="text-center">Năm sinh</th>
                                <th width="5%" style="vertical-align: middle" class="text-center">Dân tộc</th>
                                <th width="8%" style="vertical-align: middle" class="text-center">Quê quán</th>
                                <th width="17%" style="vertical-align: middle" class="text-center">Chức vụ</th>
                                <th width="13%" style="vertical-align: middle" class="text-center">Đơn vị</th>
                                <th width="8%" style="vertical-align: middle" class="text-center">Mã thẻ Đảng</th>
                                <th width="10%" style="vertical-align: middle" class="text-center">Ngày vào Đảng CT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($danhSach as $key=>$data)
                                <tr>
                                    <td class="text-center">{{$key+1}} </td>
                                    <td style="text-transform: uppercase;font-weight: bold" ><a href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown;" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa  fa-wheelchair"></i> @endif {{$data->ho_ten}}</a></td>
                                    <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                    <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
                                    <td class="text-center">Kinh</td>
                                    <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i>  {{$data->thanhPho->ten ?? ''}}</td>
                                    <td>{{$data->chucVuHienTai->ten ?? ''}}</td>
                                    <td>{{$data->donVi->ten_don_vi ?? ''}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->so_the_dang}}</td>
                                    <td class="text-center" style="vertical-align: middle">@if($data->ngay_vao_dang_chinh_thuc){{date("d/m/Y", strtotime($data->ngay_vao_dang_chinh_thuc))}}@endif</td>
                                </tr>



                            @empty
                                <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 5px">

                            </div>
                            <div class="col-md-6 text-right">
                                {!! $danhSach->appends(['so_van_ban_id' => Request::get('so_van_ban_id'),'loai_van_ban_id' => Request::get('loai_van_ban_id'),'ngay_ban_hanh_date' => Request::get('ngay_ban_hanh_date'),'end_ngay_ban_hanh' => Request::get('end_ngay_ban_hanh'), 'vb_so_den' => Request::get('vb_so_den')
                       ,'vb_so_ky_hieu' => Request::get('vb_so_ky_hieu'),'don_vi_phoi_hop_id' => Request::get('don_vi_phoi_hop_id'),
                       'end_date' => Request::get('end_date'),'start_date' => Request::get('start_date'),
                       'cap_ban_hanh_id' => Request::get('cap_ban_hanh_id'),'co_quan_ban_hanh_id' => Request::get('co_quan_ban_hanh_id'),'nguoi_ky_id' => Request::get('nguoi_ky_id'),
                       'vb_trich_yeu' => Request::get('vb_trich_yeu'), 'search' =>Request::get('search'), 'year' => Request::get('year'),
                       'don_vi_id' => Request::get('don_vi_id'), 'trinh_tu_nhan_van_ban' => Request::get('trinh_tu_nhan_van_ban')])->render() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script type="text/javascript">

        function showModal() {
            $("#myModal").modal('show');
        }
        $('.btn-export-data').on('click', function () {
            let type = $(this).data('type');
            $('input[name="type"]').val(type);
            $('.form-export').submit();
            hideLoading();
        });

        donVi='#don-vi';
        $('.select-don-vi-id').on('change', function () {
            let $this = $(this);
            let id = $this.val();

            if (id) {
                //lấy danh sach cán bộ phối hơp
                $.ajax({
                    url: APP_URL + '/get-chuc-vu/' + id,
                    type: 'GET',
                })
                    .done(function (response) {
                        var html = '<option value="">--Tất cả--</option>';
                        if (response.success) {
                            let selectAttributes = response.data.map((function (attribute) {
                                return `<option value="${attribute.id}" >${attribute.ten_chuc_vu}</option>`;
                            }));
                            $('.chuc-vu').html(html+ selectAttributes);
                        }
                        showPhongBan(response.phongBan);

                    })
                    .fail(function (error) {
                        toastr['error'](error.message, 'Thông báo hệ thống');
                    });
            }

        });
        function showPhongBan(data) {
            let html = '<option value="">Chọn phòng ban</option>';
            if (data.length > 0) {
                let selectAttributes = data.map((function (attribute) {
                    return `<option value="${attribute.id}" >${attribute.ten_don_vi}</option>`;
                }));
                $('.show-phong-ban').removeClass('hide');

                $('.select-phong-ban').html(html + selectAttributes);
            } else {
                $('.show-phong-ban').addClass('hide');
                $('.select-phong-ban').html(' ');
            }
        }


    </script>

@endsection














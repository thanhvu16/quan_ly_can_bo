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
                                <h3 class="box-title">Danh sách cán bộ</h3>
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
                                        style="font-size: 14px">Tìm kiếm cán bộ</span>
                                </a>
                            </div>
                            <div class="col-md-6 text-right">
                                    <form action method="GET" action="{{ route('tra-cuu.index') }}" class="form-export">
                                        <input type="hidden" name="type"  value="">
                                        <input type="hidden" name="loai_van_ban_id"  value="{{Request::get('loai_van_ban_id') }}">
                                        <input type="hidden" name="so_van_ban_id"  value="{{Request::get('so_van_ban_id') }}">
                                        <input type="hidden" name="vb_so_den" value="{{Request::get('vb_so_den') }}">
                                        <input type="hidden" name="vb_so_den" value="{{Request::get('vb_so_den_end') }}">
                                        <input type="hidden" name="vb_so_ky_hieu"  value="{{Request::get('vb_so_ky_hieu') }}">
                                        <input type="hidden" name="don_vi_phoi_hop_id" value="{{Request::get('don_vi_phoi_hop_id') }}">
                                        <input type="hidden" name="start_date"  value="{{Request::get('start_date') }}">
                                        <input type="hidden" name="end_date" value="{{Request::get('end_date') }}">
                                        <input type="hidden" name="cap_ban_hanh_id"  value="{{Request::get('cap_ban_hanh_id') }}">
                                        <input type="hidden" name="co_quan_ban_hanh_id" value="{{Request::get('co_quan_ban_hanh_id') }}">
                                        <input type="hidden" name="nguoi_ky_id"  value="{{Request::get('nguoi_ky_id') }}">
                                        <input type="hidden" name="vb_trich_yeu"  value="{{Request::get('vb_trich_yeu') }}">
                                        <input type="hidden" name="year"  value="{{Request::get('year') }}">
                                        <input type="hidden" name="don_vi_id" value="{{Request::get('don_vi_id') }}">
                                        <input type="hidden" name="trinh_tu_nhan_van_ban" value="{{Request::get('trinh_tu_nhan_van_ban') }}">
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
                                <form action="{{route('tra-cuu.index')}}" id="tim_kiem" method="get" >
                                    <div class="row">
                                        <div class="form-group col-md-3" >
                                            <label for="loai_van_ban_id" class="col-form-label">Tên cán bộ</label>
                                            <input type="text" name="ten_cb" value="{{Request::get('ten_cb')}}" class="form-control" placeholder="Nhập tên cán bộ..">
                                        </div>
                                        <div class="form-group col-md-3" >
                                            <label for="loai_van_ban_id" class="col-form-label">Chứng minh thư</label>
                                            <input type="text" name="cmt" value="{{Request::get('cmt')}}" class="form-control" placeholder="Nhập chứng minh thư..">
                                        </div>
                                        <div class="form-group col-md-3" >
                                            <label for="loai_van_ban_id" class="col-form-label">Mã thẻ Đảng</label>
                                            <input type="text" name="the_dang" class="form-control" value="{{Request::get('the_dang')}}" placeholder="Nhập mã thẻ đảng..">
                                        </div>


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
{{--                                        <div class="form-group col-md-3" >--}}
{{--                                            <label for="loai_van_ban_id" class="col-form-label">Tuổi Đảng</label>--}}
{{--                                            <input type="text" class="form-control" placeholder="Nhập tuổi Đảng..">--}}
{{--                                        </div>--}}

                                        <div class="form-group col-md-3" >
                                            <label for="loai_van_ban_id" class="col-form-label">Chức vụ Đảng</label>
                                            <select class="form-control " name="chuc_vu_dang" id="chuc_vu_dang">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($chucVuDang as $dschucVuDang)
                                                    <option value="{{$dschucVuDang->id}}"  {{Request::get('chuc_vu_dang') == $dschucVuDang->id ? 'selected' : ''}}>{{$dschucVuDang->ten_chuc_vu}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Trình độ chuyên môn</label>
                                            <select class="form-control  select-so-van-ban check-so-den-vb"
                                                    name="trinh_do_chuyen_mon" id="trinh_do_chuyen_mon">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($congViecChuyenMon as $dscongViecChuyenMon)
                                                    <option value="{{$dscongViecChuyenMon->id}}"  {{Request::get('trinh_do_chuyen_mon') == $dscongViecChuyenMon->id ? 'selected' : ''}}>{{$dscongViecChuyenMon->ten}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Tôn giáo</label>
                                            <select class="form-control  select-so-van-ban check-so-den-vb"
                                                    name="ton_giao" id="ton_giao">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($tonGiao as $dsTonGiao)
                                                    <option value="{{$dsTonGiao->id}}" {{Request::get('ton_giao') == $dsTonGiao->id ? 'selected' : ''}}>{{$dsTonGiao->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Tình trạng</label>
                                            <select class="form-control  select-so-van-ban check-so-den-vb"
                                                    name="tinh_trang" id="tinh_trang">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($trangThai as $dstrangThai)
                                                    <option value="{{$dstrangThai->id}}"  {{Request::get('tinh_trang') == $dstrangThai->id ? 'selected' : ''}}>{{$dstrangThai->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Chức vụ chính quyền</label>
                                            <select class="form-control  select-so-van-ban check-so-den-vb"
                                                    name="chuc_vu_chinh" id="chuc_vu_chinh">
                                                <option value="">--Lựa chọn--</option>
                                                @foreach($chucVuHienTai as $hientai)
                                                    <option value="{{$hientai->id}}"  {{Request::get('chuc_vu_chinh') == $hientai->id ? 'selected' : ''}}>{{$hientai->ten}}</option>
                                                @endforeach
                                            </select>
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
                                <th width="8%" style="vertical-align: middle" class="text-center">Chức vụ</th>
                                <th width="13%" style="vertical-align: middle" class="text-center">Đơn vị</th>
                                <th width="8%" style="vertical-align: middle" class="text-center">Mã thẻ Đảng</th>
                                <th width="10%" style="vertical-align: middle" class="text-center">Ngày vào Đảng CT</th>
                                <th width="13%" style="vertical-align: middle" class="text-center">Chức vụ Đảng</th>
                                <th width="8%" style="vertical-align: middle" class="text-center">Đơn vị đảng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($danhSach as $key=>$data)
                                <tr >
                                    <td class="text-center">{{$key+1}} </td>
                                    <td style="text-transform: uppercase;font-weight: bold" ><a href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown;" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa  fa-wheelchair"></i> @endif {{$data->ho_ten}}</a></td>
                                    <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                    <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
                                    <td class="text-center">Kinh</td>
                                    <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i> Hà Nội</td>
                                    <td>Phó chủ tịch</td>
                                    <td>Văn phòng Quận ủy</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->so_the_dang}}</td>
                                    <td class="text-center" style="vertical-align: middle">@if($data->ngay_vao_dang_chinh_thuc){{date("d/m/Y", strtotime($data->ngay_vao_dang_chinh_thuc))}}@endif</td>
                                    <td class="text-center" style="vertical-align: middle">Bí thư Đảng uỷ cơ quan</td>
                                    <td class="text-center" style="vertical-align: middle">Hội phụ nữ</td>

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
        if ($.browser.webkit) {
            $("input").attr('autocomplete','off');
        }
        if (BrowserDetect.browser == "Chrome") {
            jQuery('form').attr('autocomplete','off');
        };
        function showModal() {
            console.log(1);
            $("#myModal").modal('show');
        }
        $(document).ready(function() {
            // show the alert
            console.log(1);
            // setTimeout(function() {
            //     $(".alert").alert('close');
            // }, 2000);
        });
        $('.btn-export-data').on('click', function () {
            let type = $(this).data('type');
            // let loai_van_ban= $('[name=loai_van_ban_id]').val();
            // let so_van_ban_id= $('[name=so_van_ban_id]').val();
            // let vb_so_den= $('[name=vb_so_den]').val();
            // let vb_so_ky_hieu= $('[name=vb_so_ky_hieu]').val();
            // let don_vi_phoi_hop_id= $('[name=don_vi_phoi_hop_id]').val();
            // let start_date= $('[name=start_date]').val();
            // let end_date= $('[name=end_date]').val();
            // let cap_ban_hanh_id= $('[name=cap_ban_hanh_id]').val();
            // let co_quan_ban_hanh_id= $('[name=co_quan_ban_hanh_id]').val();
            // let nguoi_ky_id= $('[name=nguoi_ky_id]').val();
            // let vb_trich_yeu= $('[name=vb_trich_yeu]').val();
            // let year= $('[name=year]').val();
            // let don_vi_id= $('[name=don_vi_id]').val();
            // let trinh_tu_nhan_van_ban= $('[name=trinh_tu_nhan_van_ban]').val();
            $('input[name="type"]').val(type);
            $('.form-export').submit();
            hideLoading();
        });


    </script>

@endsection














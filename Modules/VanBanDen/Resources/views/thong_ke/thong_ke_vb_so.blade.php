@extends('admin::layouts.master')
@section('page_title', 'Thống kê văn bản Sở')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                        <div class="box-body">
                            <div class="row">

                                <div class="col-md-4">
                                    <a class="btn btn-default waves-effect waves-light btn-sm" role="button"  data-toggle="collapse"
                                       href="#collapseExample"
                                       aria-expanded="false" aria-controls="collapseExample"><i
                                            class="fa fa-search"></i> Lọc dữ liệu văn bản
                                    </a>

                                </div>
                                <form action method="GET" action="{{ route('thongkevbso') }}" class="form-export">
                                <div class="col-md-8 text-right">
{{--                                    <form action method="GET" action="{{ route('thongkevbso') }}" class="form-export">--}}

                                        <input type="hidden" name="type" value="">
                                        <input type="hidden" name="sovanbanden" value="">
                                        <button type="button" data-type="excel"
                                                class="btn btn-success waves-effect waves-light btn-sm btn-export-data"><i
                                                class="fa fa-file-excel-o"></i> Xuất Excel
                                        </button>
                                        <button type="button" data-type="print"
                                                class="btn btn-primary waves-effect waves-light btn-sm print-data"><i
                                                class="fa fa-print "></i> In file
                                        </button>

                                </div>
                                <div class="col-md-12 collapse in" id="collapseExample" >
{{--                                    <form action method="GET" action="{{ route('thongkevbso') }}" >--}}
                                    <div class="col-md-3 form-group mt-2">
                                        <label>Tìm từ ngày</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"></i>
                                            </div>
                                            <input type="text" class="form-control datepicker" value="{{Request::get('tu_ngay')}}"
                                                   name="tu_ngay" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group mt-2">
                                        <label>Tìm đến ngày</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"></i>
                                            </div>
                                            <input type="text" class="form-control datepicker" value="{{Request::get('den_ngay')}}"
                                                   name="den_ngay" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group mt-2">
                                        <label>Tìm theo loại văn bản</label>
                                        <select class="form-control select2" name="loai_van_ban_id" id="loai_van_ban_id">
                                            <option value="">Chọn loại văn bản</option>
                                            @foreach ($ds_loaiVanBan as $loaiVanBan)
                                                <option value="{{ $loaiVanBan->id }}" {{ Request::get('loai_van_ban_id') == $loaiVanBan->id ? 'selected' : '' }}
                                                >{{ $loaiVanBan->ten_loai_van_ban }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" class="hidden" name="loai_van_ban_id_1" value="{{Request::get('loai_van_ban_id')}}">
                                    </div>
                                    <div class="col-md-2" style="margin-top: 30px">
                                        <button type="submit" name="search" class="btn btn-primary"><i
                                                class="fa fa-search"></i> Tìm Kiếm</button>
                                    </div>
{{--                                    </form>--}}
                                </div>
                                </form>
                                <div class="col-md-12 ">
                                    <H4 style="text-align: center;font-weight: bold">BÁO CÁO THỐNG KÊ TỔNG HỢP SỐ LIỆU CHỈ ĐẠO VÀ GIẢI QUYẾT VĂN BẢN</H4><br>
                                    <h5 style="font-weight: bold">- Thời gian: {{Request::get('tu_ngay')}} @if(Request::get('tu_ngay') && Request::get('den_ngay') ) đến @endif  {{Request::get('den_ngay')}}<br><br>
                                        - Đơn vị kết xuất báo cáo: Văn phòng Sở
                                    </h5>
                                </div>
                                <div class="col-md-12" style="margin-top: 5px">
                                    <table class="table table-bordered table-striped dataTable mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle" colspan="2" width="5%"><h4>Báo cáo văn bản đến</h4></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-left" style="vertical-align: middle">Tổng số văn bản đến </td>
                                                <td class="text-center" style="vertical-align: middle;font-weight: bold">{{$tongSoVanBanDen}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left" style="vertical-align: middle">Số văn bản mới nhận</td>
                                                <td class="text-center" style="vertical-align: middle;font-weight: bold">{{$tongSoVanBanMoiNhan}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left" style="vertical-align: middle">Số văn bản đang xử lý</td>
                                                <td class="text-center" style="vertical-align: middle;font-weight: bold">{{$tongSoVanBanDangXuLy}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left" style="vertical-align: middle">Số văn bản quá hạn đang xử lý</td>
                                                <td class="text-center" style="vertical-align: middle;font-weight: bold">{{$tongSoVanBanDangXuLyQuaHan}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left" style="vertical-align: middle">Số văn bản đã hoàn thành</td>
                                                <td class="text-center" style="vertical-align: middle;font-weight: bold">{{$tongSoVanBanDaHoanThanh}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <table class="table table-bordered table-striped dataTable mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle" colspan="7" width="5%"><h4>Tổng hợp văn bản đến các đơn vị</h4></th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle" rowspan="2" width="5%">STT</th>
                                            <th class="text-center" style="vertical-align: middle" rowspan="2" width="">Đơn vị</th>
                                            <th class="text-center" style="vertical-align: middle" rowspan="2" width="10%">Tổng số văn bản</th>
                                            <th class="text-center" style="vertical-align: middle" colspan="2" width="20%">Số văn bản đã giải quyết</th>
                                            <th class="text-center" style="vertical-align: middle" colspan="2" width="20%">Số văn bản chưa giải quyết</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle">Trong hạn</th>
                                            <th class="text-center" style="vertical-align: middle">Quá hạn</th>
                                            <th class="text-center" style="vertical-align: middle">Trong hạn</th>
                                            <th class="text-center" style="vertical-align: middle">Quá Hạn </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($danhSachDonVi as $key=>$donVidata)
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle"> {{$key+1}}</td>
                                                <td class="text-left" style="vertical-align: middle;font-weight: bold">
{{--                                                    @if($donVidata->cap_xa == 1 && $donVidata->dieu_hanh == 1   )--}}
{{--                                                    <a href="{{route('thongkevbchicuc','don_vi='.$donVidata->id)}}">{{ $donVidata->ten_don_vi  }}</a>--}}
{{--                                                    @else--}}
{{--                                                        {{ $donVidata->ten_don_vi  }}--}}
{{--                                                    @endif--}}
                                                        {{ $donVidata->ten_don_vi  }}
                                                </td>
                                                <td class="text-center so-luong-tong" style="vertical-align: middle;color: red;font-weight: bold">
{{--                                                    <a href="{{route('chiTietTongVanBanSo',$donVidata->id.'?tu_ngay='.Request::get('tu_ngay').'&den_ngay='.Request::get('den_ngay'))}}">--}}
                                                        {{ $donVidata->vanBanDaGiaiQuyet['tong'] }}
{{--                                                        </a>--}}
                                                    <input type="text" class="soVB hidden" value="{{ $donVidata->vanBanDaGiaiQuyet['tong'] }}">
                                                </td>
                                                <td class="text-center" style="vertical-align: middle"> <a href="{{route('chiTietDaGiaiQuyetTrongHanVanBanSo',$donVidata->id.'?tu_ngay='.Request::get('tu_ngay').'&den_ngay='.Request::get('den_ngay'))}}">
                                                        {{ $donVidata->vanBanDaGiaiQuyet['giai_quyet_trong_han'] }}</a></td>
                                                <td style="vertical-align: middle;text-align: center">
                                                    <a href="{{route('chiTietDaGiaiQuyetQuaHanVanBanSo',$donVidata->id.'?tu_ngay='.Request::get('tu_ngay').'&den_ngay='.Request::get('den_ngay'))}}">
                                                        {{ $donVidata->vanBanDaGiaiQuyet['giai_quyet_qua_han'] }}</a>
                                                   </td>
                                                <td style="vertical-align: middle;text-align: center"><a href="{{route('chiTietChuaGiaiQuyetTrongHanVanBanSo',$donVidata->id.'?tu_ngay='.Request::get('tu_ngay').'&den_ngay='.Request::get('den_ngay'))}}">
                                                        {{ $donVidata->vanBanDaGiaiQuyet['chua_giai_quyet_giai_quyet_trong_han'] }}
                                                    </a></td>
                                                <td style="vertical-align: middle;text-align: center">
                                                    <a href="{{route('chiTietChuaGiaiQuyetQuaHanVanBanSo',$donVidata->id.'?tu_ngay='.Request::get('tu_ngay').'&den_ngay='.Request::get('den_ngay'))}}">
                                                        {{ $donVidata->vanBanDaGiaiQuyet['chua_giai_quyet_giai_quyet_qua_han'] }}
                                                    </a></td>
                                            </tr>
                                        @empty
                                            <td colspan="6" class="text-center">Không tìm thấy dữ liệu.</td>
                                        @endforelse
                                        <tr>
                                            <td style="font-weight: bold" class="text-center">*</td>
                                            <td style="font-weight: bold">Tổng số</td>
                                            <td class="text-center"><span class="tongSo text-center" style="color: red;font-weight: bold"></span>

                                            </td>
                                            <td class="" id="body1"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-6 mt-4" style="margin-top: 5px">
                                            Tổng số đơn vị: <b>{{ $danhSachDonVi->count() }}</b>
                                        </div>
                                        <div class="col-md-6 text-right">
{{--                                            {!! $danhSachDonVi->appends(['tu_ngay' => Request::get('tu_ngay'),'den_ngay' => Request::get('den_ngay')])->render() !!}--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        // $(document).ready(function() {
        //     var sum = $("#body1").val();
        //
        //         console.log(sum)
        // });
        $(document).ready(function () {
            var sum = 0;
            $('.soVB').each(function(){
                sum += parseInt($(this).val());  // Or this.innerHTML, this.innerText
            });

            $('.tongSo').append(sum);

            $('input[name="sovanbanden"]').val(sum);
        });
        $('.btn-export-data').on('click', function () {
            let type = $(this).data('type');
            $('input[name="type"]').val(type);
            $('.form-export').submit();
            hideLoading();
        });

        $('.print-data').on('click', function () {
            let $this = $(this);
            let type = $(this).data('type');
            var sovanbanden = $('input[name="sovanbanden"]').val();
            var tu_ngay = $('input[name="tu_ngay"]').val();
            var den_ngay = $('input[name="den_ngay"]').val();
            var loai_van_ban_id = $('input[name="loai_van_ban_id_1"]').val();

            console.log(loai_van_ban_id);
            $.ajax({
                beforeSend: showLoading(),
                url: APP_URL + '/thong-ke-van-ban-so',
                type: 'GET',
                data: {
                    _token: "{{ csrf_token() }}",
                    type: type,
                    sovanbanden: sovanbanden,
                    tu_ngay: tu_ngay,
                    den_ngay: den_ngay,
                    loai_van_ban_id: loai_van_ban_id


                }
            })
                .done(function (response) {
                    hideLoading();
                    w = window.open(window.location.href, "_blank");
                    w.document.open();
                    w.document.write(response.html);
                    w.document.close();
                    w.window.print();
                    // $this.printPage(response.html);
                })
                .fail(function (error) {
                    toastr['error'](error.message, 'Thông báo hệ thống');
                });

        })

        // $('.print-data').printPage();

    </script>
@endsection








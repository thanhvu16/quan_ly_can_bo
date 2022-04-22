@extends('admin::layouts.master')
@section('page_title', 'Lập danh sách cấp thẻ')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lập danh sách đợt cấp huy hiệu đảng</h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="col-md-12" style="margin-top: 20px">
                        <form action="{{route('danhSachCBDaDuyetHH')}}" method="get">
                            <div class="form-group col-md-3">
                                <div class="row form-group">
                                    <label for="exampleInputEmail4">Chọn đơn vị</label>
                                    <select class="form-control select-option-don-vi select2" name="don_vi" >
                                        <option value="">--Lựa chọn--</option>
                                        @foreach($donVi as $ds)
                                            <option value="{{$ds->id}}" {{Request::get('don_vi') == $ds->id ? 'selected' : ''}} >{{$ds->ten_don_vi}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3 show-phong-ban {{  Request::get('dot_cap') != null ? 'show' : 'hide' }} ">

                                <label for="exampleInputEmail4">Đợt cấp huy hiệu</label>
                                <select class="form-control select2 select-phong-ban" name="dot_cap">
                                    <option value="">--Lựa chọn--</option>
                                    @foreach($dotCapThe as $dsCapThe)
                                        <option value="{{$dsCapThe->id}}" {{Request::get('dot_cap') == $dsCapThe->id ? 'selected' : ''}} >{{date("d/m/Y", strtotime($dsCapThe->dot_cap_the))}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-3 mt-4" style="margin-top: 20px">
                                <button type="submit" name="search" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Tìm Kiếm</button>
                            </div>



                        </form>

                    </div>
                    <div class="box-body">
                        <div class="row">


                            <div class="col-md-12" style="max-height:650px;  overflow:auto">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" colspan="9" style="vertical-align: middle" width="3%">Danh sách cán bộ đã cấp huy hiệu đảng</th>

                                    </tr>
                                    <tr>
                                        <th class="text-center" style="vertical-align: middle" width="3%">STT</th>
                                        <th class="text-center" style="vertical-align: middle">Họ tên</th>
                                        <th class="text-center" style="vertical-align: middle" width="7%">Giới tính</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Năm sinh</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Dân tộc</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Quê quán</th>
                                        <th class="text-center" style="vertical-align: middle" width="19%">Chức vụ hiện tại</th>
                                        <th class="text-center" style="vertical-align: middle" width="17%">Đơn vị</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">In</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($danhSachTheoDot as $key=>$data)
                                        <div class="col-md-12 text-right">
                                            <form  method="GET" action="{{ route('huyHieuCanBo',$data->canBo->id) }}" class="form-export">
                                                <input type="hidden" name="type"  value="">
                                                <input type="hidden" name="dot_cap"  value="{{$data->id }}">



                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td style="text-transform: uppercase;font-weight: bold"><a href="{{route('canBoDetail',$data->canBo->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa   fa-venus"></i> @endif {{$data->canBo->ho_ten}}</a></td>
                                                    <td class="text-center">{{$data->canBo->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                                    <td class="text-center">{{date("d/m/Y", strtotime($data->canBo->ngay_sinh))}}</td>
                                                    <td class="text-center">{{$data->canBo->danToc->ten ?? ''}}</td>
                                                    <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i> {{$data->canBo->thanhPho->ten ?? ''}}</td>
                                                    <td>{{$data->canBo->chucVuHienTai->ten ?? ''}}</td>
                                                    <td>{{$data->canBo->donVi->ten_don_vi ?? ''}}</td>
                                                    <td>
                                                        <button type="button" data-type="print"
                                                                class="btn btn-primary waves-effect waves-light btn-sm print-data"><i
                                                                class="fa fa-print "></i> In quyết định
                                                        </button>
                                                    </td>
                                                </tr>

                                            </form>
                                        </div>

                                    @empty
                                        <td class="text-center" colspan="8" style="vertical-align: middle">Không có dữ liệu !</td>
                                    @endforelse

                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{--                                        <div class="col-md-6" style="margin-top: 5px">--}}
                                        {{--                                            Tổng số : <b>{{ $danhSach->total() }}</b>--}}
                                        {{--                                        </div>--}}
                                        <div class="col-md-12 text-right">
                                            @if(count($danhSachTheoDot) > 0)
                                            {!! $danhSachTheoDot->appends(['ten' => Request::get('ten'),
                                               'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
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
    <script>
        $('.select-option-don-vi').on('change', function () {
            let donViId = $(this).val();

            if (donViId) {
                $.ajax({
                    url: APP_URL + '/tim-kiem-cac-dot-cap-huy-hieu/' + donViId,
                    type: 'GET',
                })
                    .done(function (response) {
                        let html = '<option value="">Chọn đợt cấp huy hiệu</option>';
                        if (response.success && response.data.length > 0) {
                            let selectAttributes = response.data.map((function (attribute) {
                                return `<option value="${attribute.id}" >${attribute.ghi_chu}</option>`;
                            }));
                            $('.show-phong-ban').removeClass('hide');

                            $('.select-phong-ban').html(html + selectAttributes);
                        } else {
                            $('.show-phong-ban').addClass('hide');
                            $('.select-phong-ban').html(' ');
                        }
                    })
                    .fail(function (error) {
                        toastr['error'](error.message, 'Thông báo hệ thống');
                    });
            } else {
                $('.show-phong-ban').addClass('hide');
                $('.select-phong-ban').html(' ');
            }
        });
    </script>
    <script>
        $('.print-data').on('click', function () {
            let $this = $(this);
            let type = $(this).data('type');
            var id = $('input[name="dot_cap"]').val();


            $.ajax({
                beforeSend: showLoading(),
                url: APP_URL + '/danh-sach-huy-hieu-can-bo/' + id,
                type: 'GET',
                data: {
                    _token: "{{ csrf_token() }}",
                    type: type,


                }
            })
                .done(function (response) {
                    hideLoading();
                    // w = window.open(window.location.href, 'popup', 'width=1000,height=672, margin:0 auto');
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

    </script>
@endsection

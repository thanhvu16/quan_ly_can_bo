@extends('admin::layouts.master')
@section('page_title', 'Lập danh sách cấp thẻ')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách cán bộ được cấp huy hiệu đảng</h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-12 text-right">
                                <form  method="GET" action="{{ route('huyHieuCanBo',$id) }}" class="form-export">
                                    <input type="hidden" name="type"  value="">
                                    <input type="hidden" name="dot_cap"  value="{{$dotCap->id }}">


                                    <button type="button" data-type="print"
                                            class="btn btn-primary waves-effect waves-light btn-sm print-data"><i
                                            class="fa fa-print "></i> In quyết định
                                    </button>

                                </form>
                            </div>
                            <div class="col-md-12 table-don-vi2 mt-4" style="max-height:650px;  overflow:auto">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" colspan="8" style="vertical-align: middle" width="3%"><i class="fa fa-clock-o"></i> Đợt cấp huy hiệu đảng {{date("d/m/Y", strtotime($dotCap->dot_cap_the))}} </th>

                                    </tr>
                                    <tr>
                                        <th class="text-center" style="vertical-align: middle" width="3%">
                                            Chọn
                                        </th>
                                        <th class="text-center" style="vertical-align: middle">Họ tên</th>
                                        <th class="text-center" style="vertical-align: middle" width="7%">Giới tính</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Năm sinh</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Dân tộc</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Quê quán</th>
                                        <th class="text-center" style="vertical-align: middle" width="17%">Đơn vị</th>
                                        <th class="text-center" style="vertical-align: middle" width="19%">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($danhSach as $key=>$data)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">
                                                <input type="checkbox" value="{{ $data->id }}" form="can-bo" class="sub-check" name="can_bo[{{ $data->id }}]" id="can-bo-{{ $data->id .'.3' }}">
                                            </td>
                                            <td style="text-transform: uppercase;font-weight: bold"><a href="{{route('canBoDetail',$data->canBo->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa   fa-venus"></i> @endif {{$data->canBo->ho_ten}}</a></td>
                                            <td class="text-center">{{$data->canBo->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td class="text-center">{{date("d/m/Y", strtotime($data->canBo->ngay_sinh))}}</td>
                                            <td class="text-center">{{$data->canBo->danToc->ten ?? ''}}</td>
                                            <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i> {{$data->canBo->thanhPho->ten ?? ''}}</td>
                                            <td>{{$data->canBo->donVi->ten_don_vi ?? ''}}</td>
                                            <td>

                                            </td>
                                        </tr>
                                    @empty
                                        <td class="text-center" colspan="8" style="vertical-align: middle">Không có dữ liệu !</td>
                                    @endforelse

                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6" >
                                                Tổng số : <b>{{ $danhSach->total() }}</b>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                {!! $danhSach->appends(['ten' => Request::get('ten'),
                                                   'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
                                            </div>
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

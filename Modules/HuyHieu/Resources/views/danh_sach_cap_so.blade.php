@extends('admin::layouts.master')
@section('page_title', 'Lập danh sách cấp thẻ')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách cán bộ chờ cấp huy hiệu đảng</h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <form action="{{route('capSo',$dotCap->id)}}" id="can-bo" method="POST">
                                @csrf
                                <input type="hidden" name="dot_cap" value="{{Request::get('dot_cap')}}">

                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail4">Chọn loại huy hiệu</label>
                                        <select class="form-control select2" name="loai_huy_hieu" required>
                                            <option value="">--Lựa chọn--</option>
                                            @foreach($huyHieu as $ds)
                                                <option value="{{$ds->id}}" >{{$ds->ten}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <button type="submit"
                                            class="btn btn-sm mt-1 btn-submit btn-primary waves-effect waves-light  btn-duyet-all   btn-sm mb-2"
                                            data-original-title=""
                                            title=""><i class="fa fa-check"></i> Duyệt
                                    </button>
                                </div>
                            </form>

                            <div class="col-md-12 table-don-vi2" style="max-height:650px;  overflow:auto">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" colspan="8" style="vertical-align: middle" width="3%"><i class="fa fa-clock-o"></i> Đợt cấp huy hiệu đảng {{date("d/m/Y", strtotime($dotCap->dot_cap_the))}} </th>

                                    </tr>
                                    <tr>
                                        <th class="text-center" style="vertical-align: middle" width="3%">
                                            <input type="checkbox" value="" form="can-bo" class="check-all2" name="" id="">
                                        </th>
                                        <th class="text-center" style="vertical-align: middle">Họ tên</th>
                                        <th class="text-center" style="vertical-align: middle" width="7%">Giới tính</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Năm sinh</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Dân tộc</th>
                                        <th class="text-center" style="vertical-align: middle" width="10%">Quê quán</th>
                                        <th class="text-center" style="vertical-align: middle" width="19%">Chức vụ hiện tại</th>
                                        <th class="text-center" style="vertical-align: middle" width="17%">Đơn vị</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($danhSach as $key=>$data)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">
                                                <input type="checkbox" value="{{ $data->canBo->id }}" form="can-bo" class="sub-check" name="can_bo[{{ $data->id }}]" id="can-bo-{{ $data->id .'.3' }}">
                                            </td>
                                            <td style="text-transform: uppercase;font-weight: bold"><a href="{{route('canBoDetail',$data->canBo->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa   fa-venus"></i> @endif {{$data->canBo->ho_ten}}</a></td>
                                            <td class="text-center">{{$data->canBo->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td class="text-center">{{date("d/m/Y", strtotime($data->canBo->ngay_sinh))}}</td>
                                            <td class="text-center">{{$data->canBo->danToc->ten ?? ''}}</td>
                                            <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i> {{$data->canBo->thanhPho->ten ?? ''}}</td>
                                            <td>{{$data->canBo->chucVuHienTai->ten ?? ''}}</td>
                                            <td>{{$data->canBo->donVi->ten_don_vi ?? ''}}</td>
                                        </tr>
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
                                                {!! $danhSach->appends(['ten' => Request::get('ten'),
                                                   'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
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
    $(document).on('click', '.check-all2', function () {
        console.log(11);
        if ($(this).is(':checked', true)) {
            $(this).closest('.table-don-vi2').find(".sub-check").prop('checked', true);

        } else {
            $(this).closest('.table-don-vi2').find(".sub-check").prop('checked', false);
        }
    });
</script>
@endsection

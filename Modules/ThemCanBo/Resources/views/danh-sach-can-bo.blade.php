@extends('admin::layouts.master')
@section('page_title', 'Thông tin cán bộ')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title pt-2">Hồ sơ cán bộ &nbsp;
                                    @can(\App\Common\AllPermission::themCanBo())
                                        <a type="button" href="{{route('ho_so_can_bo.create')}}" class="btn btn-sm btn-default waves-effect waves-light mb-1">
                                            <i class="fa fa-plus"></i>TẠO HỒ SƠ CÁN BỘ
                                        </a>
                                    @endcan
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('duyet_ho_so_can_bo.store') }}" method="post"
                                      id="form-duyet-ho-so">
                                    @csrf
                                    <input type="hidden" name="can_bo_id" value="">
                                    <button type="button"
                                            class="btn btn-sm mt-1 btn-submit btn-primary waves-effect waves-light pull-right btn-duyet-all disabled pull-right btn-sm mb-2"
                                            data-original-title=""
                                            title=""><i class="fa fa-check"></i> Gửi duyệt
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="2%">STT</th>
                                        <th class="text-center">Họ tên</th>
                                        <th class="text-center" width="7%">Giới tính</th>
                                        <th class="text-center" width="10%">Năm sinh</th>
                                        <th class="text-center" width="5%">Dân tộc</th>
                                        <th class="text-center" width="10%">Quê quán</th>
                                        <th class="text-center" width="13%">Chức vụ hiện tại</th>
                                        <th class="text-center" width="20%">Đơn vị</th>
                                        <th class="text-center" width="10%">Gửi duyệt</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($danhSach as $key=>$data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td style="text-transform: uppercase;font-weight: bold"><a href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa  fa-wheelchair"></i> @endif {{$data->ho_ten}}</a></td>
                                            <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
                                            <td class="text-center">{{$data->danToc->ten ?? ''}}</td>
                                            <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i> {{$data->thanhPho->ten ?? ''}}</td>
                                            <td>{{$data->chucVuHienTai->ten ?? ''}}</td>
                                            <td>{{$data->donVi->ten_don_vi ?? ''}}</td>
                                            <td>
                                                <select class="form-control select2 select-lanh-dao-duyet"
                                                        data-id="{{ $data->id }}" name="lanh_dao_id[{{ $data->id }}]"
                                                        form="form-duyet-ho-so"
                                                >
                                                    <option value="">-- Chọn lãnh đạo duyệt --</option>
                                                    @if ($danhSachLanhDaoDuyet)
                                                        @foreach($danhSachLanhDaoDuyet as $lanhDaoDuyet)
                                                            <option value="{{ $lanhDaoDuyet->id }}">{{ $lanhDaoDuyet->ho_ten }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="9">Không có dữ liệu</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 5px">
                                Tổng số : <b>{{ $danhSach->total() }}</b>
                            </div>
                            <div class="col-md-6 col-12">
                                <button type="button"
                                        class="btn btn-sm btn-primary btn-submit waves-effect waves-light pull-right btn-duyet-all disabled pullright btn-sm mb-2"
                                        form="form-duyet-ho-so"
                                        title=""><i class="fa fa-check"></i> Gửi duyệt
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                {!! $danhSach->appends(['ten' => Request::get('ten'),
                                   'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
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
    let canBoId = null;
    let arrCanBoId = [];

    $('.select-lanh-dao-duyet').on('change', function () {
        let $this = $(this);
        let id = $this.val();
        canBoId = $this.data('id');

        if (id) {
            checkCanBoId(canBoId);
        } else {
            removeCanBoId(canBoId);
        }
    });

    function checkCanBoId(id) {
        if (arrCanBoId.indexOf(id) === -1) {
            arrCanBoId.push(id);
        }

        $('#form-duyet-ho-so').find('input[name="can_bo_id"]').val(JSON.stringify(arrCanBoId));

        $('.btn-duyet-all').removeClass('disabled');
    }

    function removeCanBoId(id) {
        let index = arrCanBoId.indexOf(id);

        if (index > -1) {
            arrCanBoId.splice(index, 1);
        }
        $('#form-duyet-ho-so').find('input[name="can_bo_id"]').val(JSON.stringify(arrCanBoId));
    }

    $('.btn-submit').on('click', function () {
        let id = $('#form-duyet-ho-so').find('input[name="can_bo_id"]').val();
        if (id.length == 0) {
            toastr['warning']('Vui lòng chọn trước khi duyệt', 'Thông báo hệ thống');
        } else {
            $('#form-duyet-ho-so').submit();
        }
    })

</script>
@endsection

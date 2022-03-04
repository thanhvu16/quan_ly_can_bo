@extends('admin::layouts.master')
@section('page_title', 'Danh sách hồ sơ')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title pt-2">Danh sách &nbsp;
                                    <a class="btn btn-default btn-sm" data-toggle="collapse"
                                       href="#collapse-tim-kiem-can-bo"
                                       aria-expanded="false" aria-controls="collapse-tim-kiem-can-bo"> <i
                                            class="fa  fa-search"></i> <span
                                            style="font-size: 14px">Tìm kiếm cán bộ</span>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 collapse {{ Request::get('search') ? 'in' : null }}" id="collapse-tim-kiem-can-bo">
                                <form action="" id="tim_kiem" method="get">
                                    <div class="form-group col-md-3">
                                        <label for="ho-ten" class="col-form-label">Tên cán bộ</label>
                                        <input type="text" name="ho_ten" value="{{ Request::get('ho_ten') }}"
                                               class="form-control" placeholder="Nhập tên cán bộ..">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="que-quan" class="col-form-label">Quê quán</label>
                                        <input type="text" name="que_quan" value="{{ Request::get('que_quan') }}"
                                               class="form-control" placeholder="Nhập quê quán..">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="gioi-tinh" class="col-form-label">Giới tính</label>
                                        <select class="form-control select2"
                                                name="gioi_tinh" id="gioi-tinh">
                                            <option value="">--Lựa chọn--</option>
                                            <option value="1" {{Request::get('gioi_tinh') == 1 ? 'selected' : ''}}>Nam
                                            </option>
                                            <option value="2" {{Request::get('gioi_tinh') == 2 ? 'selected' : ''}}>Nữ
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="don-vi" class="col-form-label">Đơn vị</label>
                                        <select class="form-control select2"
                                                name="don_vi_id" id="don-vi">
                                            <option value="">--Lựa chọn--</option>
                                            @foreach($danhSachToChuc as $toChuc)
                                                <option
                                                    value="{{ $toChuc->id }}" {{Request::get('don_vi_id') == $toChuc->id ? 'selected' : ''}}>{{ $toChuc->ten_don_vi }}</option>
                                            @endforeach

                                        </select>
                                        <input type="hidden" name="vi_tri" value="{{Request::get('vi_tri')}}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" name="search" value="1"><i class="fa fa-search"></i> Tìm
                                            kiếm
                                        </button>
                                        @if (Request::get('search'))
                                            <a  href="{{ route('ho_so_can_bo.da_gui_duyet') }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <h4 class="text-uppercase">Quản lý hồ sơ cán bộ tại {{ $tenDonVi ?? null }}</h4>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="2%">STT</th>
                                        <th class="text-center" width="15%">Họ tên</th>
                                        <th class="text-center" width="7%">Giới tính</th>
                                        <th class="text-center" width="10%">Năm sinh</th>
                                        <th class="text-center" width="7%">Dân tộc</th>
                                        <th class="text-center" width="10%">Quê quán</th>
                                        <th class="text-center" width="13%">Chức vụ hiện tại</th>
                                        <th class="text-center" width="20%">Đơn vị</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($danhSach as $key=>$data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td style="text-transform: uppercase;font-weight: bold"><a
                                                    href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1)
                                                        <i style="color: brown" class="fa fa-user-secret"></i>  @else <i
                                                            style="color: hotpink"
                                                            class="fa  fa-female"></i> @endif {{$data->ho_ten}}</a>
                                            </td>
                                            <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
                                            <td class="text-center">{{$data->danToc->ten ?? ''}}</td>
                                            <td class="text-center"><i
                                                    class="fa fa-map-marker margin-r-5"></i> {{$data->thanhPho->ten ?? ''}}
                                            </td>
                                            <td>{{$data->chucVuHienTai->ten ?? ''}}</td>
                                            <td>{{$data->donVi->ten_don_vi ?? ''}}</td>
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
                            <div class="col-md-6 text-right">
                                {!! $danhSach->appends(['ho_ten' => Request::get('ho_ten'),
                                   'que_quan' => Request::get('que_quan'),
                                   'vi_tri' => Request::get('vi_tri'),
                                   'gioi_tinh' => Request::get('gioi_tinh'),
                                   'don_vi_id' => Request::get('don_vi_id'),
                                   'thong_ke' => Request::get('thong_ke'),
                                   'dang_vien' => Request::get('dang_vien'),
                                   'khen_thuong' => Request::get('khen_thuong'),
                                   'ky_luat' => Request::get('ky_luat'),
                                   'chuyen_cong_tac' => Request::get('chuyen_cong_tac'),
                                   've_huu' => Request::get('ve_huu'),
                                   'search' =>Request::get('search') ])->render() !!}
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
